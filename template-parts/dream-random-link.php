<a target="_blank" href="<?php
                          $dream = array(
                            "https://youtu.be/1riYj3DXxmY",
                            "https://youtu.be/9M6AtfXf6rI",
                            "https://youtu.be/qsxGL9nkTaM"
                          );

                          // 配列の長さをカウント
                          $array_length  = count($dream);

                          // 配列の長さ分ランダムに表示
                          $random = mt_rand(0, $array_length - 1);

                          // 配列の内容を表示
                          echo $dream[$random];

                          ?>">夢</a>