<?php

use App\Game01;

describe('Game 01', function () {

    beforeEach(function() {
        $this->M = [-27, 43, 2, 12, 32, -4, 9, 0, 21, 3, 7, -5, -9, 70];
    });

    describe('#sum', function () {

        context ('resolved numbers', function () {

            it ('resolved number 44', function () {
                $sum = Game01::sum($this->M, 44);

                expect($sum)->toBe([12, 32]);
            });

            it ('resolved number 10', function () {
                $sum = Game01::sum($this->M, 10);

                expect($sum)->toBe([3, 7]);
            });

        });


        context('unresolved numbers', function () {

            it ('unresolved number 22', function () {
                $sum = Game01::sum($this->M, 22);

                expect($sum)->toBe(null);
            });

            it ('unresolved number 58', function () {
                $sum = Game01::sum($this->M, 58);

                expect($sum)->toBe(null);
            });

        });

    });

});
