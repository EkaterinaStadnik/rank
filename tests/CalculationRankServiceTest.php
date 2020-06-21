<?php

namespace App\Tests;

use App\Service\RankService;
use PHPUnit\Framework\TestCase;

class CalculationRankServiceTest extends TestCase
{
    private $rankService;

    protected function setUp(): void
    {
        $this->rankService = new RankService();
    }

    /**
     * @dataProvider positiveProvider()
     */
    public function testPositive(array $data, array $correctResult)
    {
        $result = $this->rankService->buildRating($data);
        $this->assertEquals($result, $correctResult);
    }

    /**
     * @dataProvider negativeProvider
     */
    public function testNegative(array $data)
    {
        $errorMessage = 'Data is not correct';
        $this->expectExceptionMessage($errorMessage);
        $this->rankService->buildRating($data);
    }

    public function positiveProvider()
    {
        return [
            [
                [
                    [
                        'team'   => 'Team1',
                        'scores' => 99,
                    ],
                    [
                        'team'   => 'Team4',
                        'scores' => 14,
                    ],
                    [
                        'team'   => 'Team2',
                        'scores' => 99,
                    ],
                    [
                        'team'   => 'Team3',
                        'scores' => 99,
                    ],
                    [
                        'team'   => 'Team5',
                        'scores' => 14,
                    ],
                ],
                [
                    [
                        "rank"   => 1,
                        "team"   => "Team1",
                        "scores" => 99,
                    ],
                    [
                        "rank"   => 1,
                        "team"   => "Team2",
                        "scores" => 99,
                    ],
                    [
                        "rank"   => 1,
                        "team"   => "Team3",
                        "scores" => 99,
                    ],
                    [
                        "rank"   => 4,
                        "team"   => "Team4",
                        "scores" => 14,
                    ],
                    [
                        "rank"   => 4,
                        "team"   => "Team5",
                        "scores" => 14,
                    ],
                ],
            ],
            [

                [
                    [
                        "team"   => "Team1",
                        "scores" => 99,
                    ],
                    [
                        "team"   => "Team4",
                        "scores" => 14,
                    ],
                    [
                        "team"   => "Team2",
                        "scores" => 14,
                    ],
                    [
                        "team"   => "Team3",
                        "scores" => 14,
                    ],
                ],
                [
                    [
                        "rank"   => 1,
                        "team"   => "Team1",
                        "scores" => 99,
                    ],
                    [
                        "rank"   => 2,
                        "team"   => "Team4",
                        "scores" => 14,
                    ],
                    [
                        "rank"   => 2,
                        "team"   => "Team2",
                        "scores" => 14,
                    ],
                    [
                        "rank"   => 2,
                        "team"   => "Team3",
                        "scores" => 14,
                    ],
                ],
            ],
            [
                [
                    [
                        "team"   => "Team1",
                        "scores" => 99,
                    ],
                    [
                        "team"   => "Team4",
                        "scores" => 88,
                    ],
                    [
                        "team"   => "Team2",
                        "scores" => 14,
                    ],
                    [
                        "team"   => "Team3",
                        "scores" => 14,
                    ],
                ],
                [
                    [
                        "rank"   => 1,
                        "team"   => "Team1",
                        "scores" => 99,
                    ],
                    [
                        "rank"   => 2,
                        "team"   => "Team4",
                        "scores" => 88,
                    ],
                    [
                        "rank"   => 3,
                        "team"   => "Team2",
                        "scores" => 14,
                    ],
                    [
                        "rank"   => 3,
                        "team"   => "Team3",
                        "scores" => 14,
                    ],
                ],
            ],
            [
                [
                    [
                        "team"   => "lspFR",
                        "scores" => 537
                    ],
                    [
                        "team"   => "tOPoF",
                        "scores" => 999
                    ],
                    [
                        "team"   => "iKZEk",
                        "scores" => 705
                    ],
                    [
                        "team"   => "fVPDN",
                        "scores" => 105
                    ],
                    [
                        "team"   => "UcNdF",
                        "scores" => 482
                    ],
                    [
                        "team"   => "cMBpf",
                        "scores" => 703
                    ],
                    [
                        "team"   => "IelOd",
                        "scores" => 292
                    ],
                    [
                        "team"   => "nqxUw",
                        "scores" => 558
                    ],
                    [
                        "team"   => "WxGbo",
                        "scores" => 473
                    ],
                    [
                        "team"   => "NCrkU",
                        "scores" => 33
                    ],
                    [
                        "team"   => "sBiJv",
                        "scores" => 227
                    ],
                    [
                        "team"   => "viAUO",
                        "scores" => 999
                    ],
                    [
                        "team"   => "raRPH",
                        "scores" => 712
                    ],
                    [
                        "team"   => "lZCqX",
                        "scores" => 508
                    ],
                    [
                        "team"   => "SFOer",
                        "scores" => 281
                    ],
                    [
                        "team"   => "GkFUj",
                        "scores" => 614
                    ],
                    [
                        "team"   => "GCHrf",
                        "scores" => 223
                    ],
                    [
                        "team"   => "lDpXW",
                        "scores" => 626
                    ],
                    [
                        "team"   => "kqrMJ",
                        "scores" => 742
                    ],
                    [
                        "team"   => "YDJvL",
                        "scores" => 988
                    ],
                    [
                        "team"   => "NeEJX",
                        "scores" => 246
                    ],
                    [
                        "team"   => "bKOzi",
                        "scores" => 389
                    ],
                    [
                        "team"   => "IVDhe",
                        "scores" => 606
                    ],
                    [
                        "team"   => "fTSJX",
                        "scores" => 606
                    ],
                    [
                        "team"   => "eFqTS",
                        "scores" => 914
                    ],
                    [
                        "team"   => "EKkfp",
                        "scores" => 350
                    ],
                    [
                        "team"   => "nEDjU",
                        "scores" => 415
                    ],
                    [
                        "team"   => "NuBfa",
                        "scores" => 711
                    ],
                    [
                        "team"   => "DEirS",
                        "scores" => 350
                    ],
                    [
                        "team"   => "PbcFp",
                        "scores" => 208
                    ],
                    [
                        "team"   => "vsPqk",
                        "scores" => 836
                    ],
                    [
                        "team"   => "sVrPk",
                        "scores" => 530
                    ],
                    [
                        "team"   => "ZwCKF",
                        "scores" => 231
                    ],
                    [
                        "team"   => "gCZez",
                        "scores" => 485
                    ],
                    [
                        "team"   => "puOWI",
                        "scores" => 104
                    ],
                    [
                        "team"   => "bWUpQ",
                        "scores" => 897
                    ],
                    [
                        "team"   => "kMbQu",
                        "scores" => 278
                    ],
                    [
                        "team"   => "zpKnh",
                        "scores" => 676
                    ],
                    [
                        "team"   => "bWfAG",
                        "scores" => 615
                    ],
                    [
                        "team"   => "xlJPz",
                        "scores" => 360
                    ],
                    [
                        "team"   => "pLOZt",
                        "scores" => 688
                    ],
                    [
                        "team"   => "NVWzE",
                        "scores" => 245
                    ],
                    [
                        "team"   => "eIrYk",
                        "scores" => 164
                    ],
                    [
                        "team"   => "mZpJr",
                        "scores" => 954
                    ],
                    [
                        "team"   => "ClgiJ",
                        "scores" => 155
                    ],
                    [
                        "team"   => "AgRGd",
                        "scores" => 875
                    ],
                    [
                        "team"   => "dJbSV",
                        "scores" => 859
                    ],
                    [
                        "team"   => "TROiD",
                        "scores" => 365
                    ],
                    [
                        "team"   => "sDgtF",
                        "scores" => 893
                    ],
                    [
                        "team"   => "ZDcJR",
                        "scores" => 191
                    ]
                ],
                [
                    [
                        "rank"   => 1,
                        "team"   => "tOPoF",
                        "scores" => 999
                    ],
                    [
                        "rank"   => 1,
                        "team"   => "viAUO",
                        "scores" => 999
                    ],
                    [
                        "rank"   => 3,
                        "team"   => "YDJvL",
                        "scores" => 988
                    ],
                    [
                        "rank"   => 4,
                        "team"   => "mZpJr",
                        "scores" => 954
                    ],
                    [
                        "rank"   => 5,
                        "team"   => "eFqTS",
                        "scores" => 914
                    ],
                    [
                        "rank"   => 6,
                        "team"   => "bWUpQ",
                        "scores" => 897
                    ],
                    [
                        "rank"   => 7,
                        "team"   => "sDgtF",
                        "scores" => 893
                    ],
                    [
                        "rank"   => 8,
                        "team"   => "AgRGd",
                        "scores" => 875
                    ],
                    [
                        "rank"   => 9,
                        "team"   => "dJbSV",
                        "scores" => 859
                    ],
                    [
                        "rank"   => 10,
                        "team"   => "vsPqk",
                        "scores" => 836
                    ],
                    [
                        "rank"   => 11,
                        "team"   => "kqrMJ",
                        "scores" => 742
                    ],
                    [
                        "rank"   => 12,
                        "team"   => "raRPH",
                        "scores" => 712
                    ],
                    [
                        "rank"   => 13,
                        "team"   => "NuBfa",
                        "scores" => 711
                    ],
                    [
                        "rank"   => 14,
                        "team"   => "iKZEk",
                        "scores" => 705
                    ],
                    [
                        "rank"   => 15,
                        "team"   => "cMBpf",
                        "scores" => 703
                    ],
                    [
                        "rank"   => 16,
                        "team"   => "pLOZt",
                        "scores" => 688
                    ],
                    [
                        "rank"   => 17,
                        "team"   => "zpKnh",
                        "scores" => 676
                    ],
                    [
                        "rank"   => 18,
                        "team"   => "lDpXW",
                        "scores" => 626
                    ],
                    [
                        "rank"   => 19,
                        "team"   => "bWfAG",
                        "scores" => 615
                    ],
                    [
                        "rank"   => 20,
                        "team"   => "GkFUj",
                        "scores" => 614
                    ],
                    [
                        "rank"   => 21,
                        "team"   => "IVDhe",
                        "scores" => 606
                    ],
                    [
                        "rank"   => 21,
                        "team"   => "fTSJX",
                        "scores" => 606
                    ],
                    [
                        "rank"   => 23,
                        "team"   => "nqxUw",
                        "scores" => 558
                    ],
                    [
                        "rank"   => 24,
                        "team"   => "lspFR",
                        "scores" => 537
                    ],
                    [
                        "rank"   => 25,
                        "team"   => "sVrPk",
                        "scores" => 530
                    ],
                    [
                        "rank"   => 26,
                        "team"   => "lZCqX",
                        "scores" => 508
                    ],
                    [
                        "rank"   => 27,
                        "team"   => "gCZez",
                        "scores" => 485
                    ],
                    [
                        "rank"   => 28,
                        "team"   => "UcNdF",
                        "scores" => 482
                    ],
                    [
                        "rank"   => 29,
                        "team"   => "WxGbo",
                        "scores" => 473
                    ],
                    [
                        "rank"   => 30,
                        "team"   => "nEDjU",
                        "scores" => 415
                    ],
                    [
                        "rank"   => 31,
                        "team"   => "bKOzi",
                        "scores" => 389
                    ],
                    [
                        "rank"   => 32,
                        "team"   => "TROiD",
                        "scores" => 365
                    ],
                    [
                        "rank"   => 33,
                        "team"   => "xlJPz",
                        "scores" => 360
                    ],
                    [
                        "rank"   => 34,
                        "team"   => "EKkfp",
                        "scores" => 350
                    ],
                    [
                        "rank"   => 34,
                        "team"   => "DEirS",
                        "scores" => 350
                    ],
                    [
                        "rank"   => 36,
                        "team"   => "IelOd",
                        "scores" => 292
                    ],
                    [
                        "rank"   => 37,
                        "team"   => "SFOer",
                        "scores" => 281
                    ],
                    [
                        "rank"   => 38,
                        "team"   => "kMbQu",
                        "scores" => 278
                    ],
                    [
                        "rank"   => 39,
                        "team"   => "NeEJX",
                        "scores" => 246
                    ],
                    [
                        "rank"   => 40,
                        "team"   => "NVWzE",
                        "scores" => 245
                    ],
                    [
                        "rank"   => 41,
                        "team"   => "ZwCKF",
                        "scores" => 231
                    ],
                    [
                        "rank"   => 42,
                        "team"   => "sBiJv",
                        "scores" => 227
                    ],
                    [
                        "rank"   => 43,
                        "team"   => "GCHrf",
                        "scores" => 223
                    ],
                    [
                        "rank"   => 44,
                        "team"   => "PbcFp",
                        "scores" => 208
                    ],
                    [
                        "rank"   => 45,
                        "team"   => "ZDcJR",
                        "scores" => 191
                    ],
                    [
                        "rank"   => 46,
                        "team"   => "eIrYk",
                        "scores" => 164
                    ],
                    [
                        "rank"   => 47,
                        "team"   => "ClgiJ",
                        "scores" => 155
                    ],
                    [
                        "rank"   => 48,
                        "team"   => "fVPDN",
                        "scores" => 105
                    ],
                    [
                        "rank"   => 49,
                        "team"   => "puOWI",
                        "scores" => 104
                    ],
                    [
                        "rank"   => 50,
                        "team"   => "NCrkU",
                        "scores" => 33
                    ]
                ]
            ],
        ];
    }

    public function negativeProvider()
    {
        return [
          [
            [
             [
                 "rank" => 1,
                 "scores" => 99
             ],
             [
                 "team" => "Team",
                 "scores" => 14
             ],
             [
                 "team" => "Team2",
                 "scores" => 88
             ]
            ]
        ],
          [
            [
              [
                  "team"   => 1,
                  "scores" => 99
              ],
              [
                  "Team",
                  "scores" => 14
              ],
              [
                  "team"   => "Team2",
                  "scores" => 88
              ]
            ]
        ],
          [
              [
                  [
                      "team"   => 1,
                      "scores" => 99
                  ],
                  [
                      "team"   => "Team",
                      "scores" => 14
                  ],
                  [
                      "team" => "Team2",
                      "scores",
                  ]
              ]
            ],
        ];
    }
}
