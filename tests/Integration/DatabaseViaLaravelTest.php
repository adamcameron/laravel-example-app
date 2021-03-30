<?php

namespace adamCameron\laravelExampleApp\tests\Integration;

use adamCameron\laravelExampleApp\tests\TestCase;
use Illuminate\Support\Facades\DB;

class DatabaseViaLaravelTest extends TestCase
{

    /**
     * @testDox It can read expected data from the database
     * @coversNothing
     */
    public function testDatabaseRead()
    {
        $testRecords = DB::select("
            SELECT
                id, value
            FROM
                test
            ORDER BY
                id
        ");
        $this->assertCount(2, $testRecords);
        $this->assertEquals(
            [
                (object) ['id' => '101', 'value' => 'Test row 1'],
                (object) ['id' => '102', 'value' => 'Test row 2']
            ],
            $testRecords
        );
    }


    /**
     * @testDox It can write expected data from the database
     * @coversNothing
     */
    public function testDatabaseWrite()
    {

        DB::transaction(function () {
            $testValue = 'TEST_VALUE';

            DB::insert(
                "INSERT INTO test (
                value
            ) VALUES (
                :value
            )
            ",
                ['value' => $testValue]
            );

            $testRecords = DB::select("
            SELECT
                value
            FROM
                test
            ORDER BY
                id DESC
            LIMIT
                1
        ");

            $this->assertCount(1, $testRecords);
            $this->assertEquals([(object)['value' => $testValue]], $testRecords);

            DB::rollBack();
        });

    }
}
