<?php
use dosamigos\chartjs\ChartJs;
?>

<div class="pt-4 col-md-8">
    <?= ChartJs::widget([
        'type' => 'pie',
        'options' => [
            'height' => 100,
            'width' => 300
        ],
        'data' => [
            'labels' => ["Kayu", "Sopir", "User"],
            'datasets' => [
                [
                    'label' => "My First dataset",
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],
                    'pointHoverBorderColor' => "rgba(179,181,198,1)",
                    'data' => [$kayu, $supir, $user]
                ],
            ]
        ]
    ]);
    ?>
    
</div>
