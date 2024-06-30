<?php

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

beforeEach(function () {
    DB::statement('VACUUM');
});

it('can run migration', function () {
    (new Filesystem())->cleanDirectory(app()->databasePath('/migrations'));

    $this->artisan('make:session-table')->assertSuccessful();
    $this->artisan('migrate')->assertSuccessful();
    expect(Schema::hasTable('sessions'))->toBeTrue()
        ->and(Schema::hasColumn('sessions', 'ip_address'))->toBeFalse()
        ->and(Schema::hasColumn('sessions', 'user_agent'))->toBeFalse();
});

it('can still use session handler', function () {
    $identifier = '25ce5853-0341-4bc4-ad39-20f95b95f833';

    (new Filesystem())->cleanDirectory(app()->databasePath('/migrations'));

    expect(Artisan::call('make:session-table'))->toBe(0)
        ->and(Artisan::call('migrate:fresh'))->toBe(0);

    $this->assertDatabaseCount('sessions', 0);

    $response = $this->withHeader('Accept', 'application/json')
        ->get('/.testing/'.$identifier.'/sessionHandler');

    $response->assertContent("Hexafuchs\PrivacyFriendlyDatabaseSessionHandler\PrivacyFriendlyDatabaseSessionHandler");

    $key = Str::random(32);
    $value = Str::random(32);

    $response = $this->withHeader('Accept', 'application/json')
        ->get('/.testing/'.$identifier.'/put/'.$key.'/'.$value);

    $response->assertStatus(200);

    $response = $this->withHeader('Accept', 'application/json')
        ->get('/.testing/'.$identifier.'/get/'.$key);

    $response->assertContent($value);

    $response = $this->withHeader('Accept', 'application/json')
        ->get('/.testing/'.$identifier.'/count');

    $response->assertContent('1');

    $this->assertDatabaseCount('sessions', 1);
});
