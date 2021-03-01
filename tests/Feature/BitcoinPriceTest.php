<?php

namespace Tests\Feature;

use Tests\TestCase;

class BitcoinPriceTest extends TestCase
{

    public function test_invalid_date_is_throwing_an_exception(): void
    {
        $res = $this->post('/bitcoin-price', [
            'start' => '2020-12-12',
            'end' => 'wrong date'
        ]);

        $this->assertEquals(404, $res->exception->getCode());
    }
    public function test_end_date_is_before_start_date_is_throwing_an_exception(): void
    {
        $res = $this->post('/bitcoin-price', [
            'start' => '2020-12-12',
            'end' => '2020-12-10'
        ]);

        $this->assertEquals(404, $res->exception->getCode());
    }

    public function test_valid_date_input_should_return_price_list(): void
    {
        $res = $this->post('/bitcoin-price', [
            'start' => '2021-02-19',
            'end' => '2021-03-01'
        ]);

        $this->assertCount(10, $res->json());
        $res->assertOk();
    }

    public function test_no_date_input_should_return_price_list(): void
    {
        $res = $this->post('/bitcoin-price');

        $this->assertCount(31, $res->json());
        $res->assertOk();
    }
}
