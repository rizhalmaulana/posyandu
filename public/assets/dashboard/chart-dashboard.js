'use strict';

(function() {
    let cardColor, labelColor, headingColor, borderColor, bodyColor, grayColor, legendColor;
    
    // Color Variables
    const purpleColor = '#836AF9',
    yellowColor = '#ffe800',
    cyanColor = '#28dac6',
    orangeColor = '#FF8132',
    orangeLightColor = '#ffcf5c',
    oceanBlueColor = '#299AFF',
    greyColor = '#4F5D70',
    greyLightColor = '#EDF1F4',
    blueColor = '#2B9AFF',
    blueLightColor = '#84D0FF';
    
    if (isDarkStyle) {
        cardColor = config.colors_dark.cardColor;
        labelColor = config.colors_dark.textMuted;
        headingColor = config.colors_dark.headingColor;
        borderColor = config.colors_dark.borderColor;
        bodyColor = config.colors_dark.bodyColor;
        grayColor = '#3b3e59';
    } else {
        cardColor = config.colors.cardColor;
        labelColor = config.colors.textMuted;
        headingColor = config.colors.headingColor;
        borderColor = config.colors.borderColor;
        bodyColor = config.colors.bodyColor;
        grayColor = '#f4f4f6';
    }
    
    // Weekly Overview Line Chart
    // --------------------------------------------------------------------
    fetch('/get-riwayat-kunjungan')
        .then(response => response.json())
        .then(data => {
            // Handle the data in your JavaScript
            console.log('Data received:', data);
            
            // Use the data as needed, for example, update the DOM
            document.getElementById('output').innerText = JSON.stringify(data);
        }).catch(error => console.error('Error:', error));
    
    const weeklyOverviewChartEl = document.querySelector('#weeklyOverviewChart'),
    weeklyOverviewChartConfig = {
        chart: {
            type: 'line',
            height: 178,
            offsetY: -9,
            offsetX: -16,
            parentHeightOffset: 0,
            toolbar: {
                show: false
            }
        },
        series: [
            {
                name: 'Terdaftar',
                type: 'column',
                data: [1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                color: config.colors.primary
            },
            {
                name: 'Tercatat',
                type: 'line',
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                color: config.colors.info
            },
            {
                name: 'Tidak Tercatat',
                type: 'line',
                data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                color: config.colors.danger
            }
        ],
        plotOptions: {
            bar: {
                borderRadius: 9,
                columnWidth: '35%',
                endingShape: 'rounded',
                startingShape: 'rounded',
                colors: {
                    ranges: [
                        {
                            to: 100,
                            from: 10,
                            color: config.colors.warning
                        }
                    ]
                }
            }
        },
        markers: {
            size: 3.5,
            strokeWidth: 2,
            fillOpacity: 1,
            strokeOpacity: 1,
            colors: [cardColor],
            strokeColors: config.colors.primary
        },
        stroke: {
            width: [1, 3],
            colors: [config.colors.info]
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        colors: [grayColor],
        grid: {
            strokeDashArray: 10,
            borderColor,
            padding: {
                bottom: -10
            }
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            tickPlacement: 'on',
            labels: {
                show: false
            },
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            }
        },
        yaxis: {
            min: 0,
            max: 20,
            show: true,
            tickAmount: 5,
            labels: {
                formatter: function (val) {
                    return parseInt(val) + ' Orang';
                },
                style: {
                    fontSize: '0.75rem',
                    fontFamily: 'Inter',
                    colors: labelColor
                }
            }
        },
        states: {
            hover: {
                filter: {
                    type: 'none'
                }
            },
            active: {
                filter: {
                    type: 'none'
                }
            }
        },
        responsive: [
            {
                breakpoint: 1462,
                options: {
                    plotOptions: {
                        bar: {
                            columnWidth: '40%'
                        }
                    }
                }
            },
            {
                breakpoint: 1388,
                options: {
                    plotOptions: {
                        bar: {
                            columnWidth: '45%',
                            borderRadius: 8
                        }
                    }
                }
            },
            {
                breakpoint: 1030,
                options: {
                    plotOptions: {
                        bar: {
                            columnWidth: '48%'
                        }
                    }
                }
            },
            {
                breakpoint: 992,
                options: {
                    plotOptions: {
                        bar: {
                            columnWidth: '28%'
                        }
                    }
                }
            },
            {
                breakpoint: 874,
                options: {
                    plotOptions: {
                        bar: {
                            columnWidth: '38%'
                        }
                    }
                }
            },
            {
                breakpoint: 768,
                options: {
                    plotOptions: {
                        bar: {
                            columnWidth: '28%',
                            borderRadius: 10
                        }
                    }
                }
            },
            {
                breakpoint: 500,
                options: {
                    plotOptions: {
                        bar: {
                            borderRadius: 7
                        }
                    }
                }
            },
            {
                breakpoint: 393,
                options: {
                    plotOptions: {
                        bar: {
                            borderRadius: 6
                        }
                    }
                }
            }
        ]
    };
    if (typeof weeklyOverviewChartEl !== undefined && weeklyOverviewChartEl !== null) {
        const weeklyOverviewChart = new ApexCharts(weeklyOverviewChartEl, weeklyOverviewChartConfig);
        weeklyOverviewChart.render();
    }
    
    // Line Chart
    // --------------------------------------------------------------------
    
    const lineChart = document.getElementById('lineChart');
    if (lineChart) {
        const lineChartVar = new Chart(lineChart, {
            type: 'line',
            data: {
                labels: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
                datasets: [
                    {
                        data: [3.8, 4.8, 5.8, 6.5, 7.2, 7.8, 8.2, 8.5, 9, 9.2, 9.5, 9.8, 10.2, 10.4, 10.6, 10.8, 11.2, 11.4, 11.6, 11.8, 12, 12.2, 12.4, 12.8, 13],
                        label: 'Garis Kuning',
                        borderColor: config.colors.warning,
                        tension: 0.5,
                        pointStyle: 'circle',
                        backgroundColor: config.colors.warning,
                        fill: false,
                        pointRadius: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 5,
                        pointBorderColor: 'transparent',
                        pointHoverBorderColor: cardColor,
                        pointHoverBackgroundColor: config.colors.warning
                    },
                    {
                        data: [3.2, 4.2, 5, 5.8, 6.2, 6.8, 7.2, 7.5, 7.8, 8.2, 8.5, 8.8, 9.2, 9.3, 9.5, 9.8, 10, 10.2, 10.3, 10.5, 10.7, 11, 11.2, 11.5, 11.7],
                        label: 'Garis Hijau',
                        borderColor: config.colors.success,
                        tension: 0.5,
                        pointStyle: 'circle',
                        backgroundColor: config.colors.success,
                        fill: false,
                        pointRadius: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 5,
                        pointBorderColor: 'transparent',
                        pointHoverBorderColor: cardColor,
                        pointHoverBackgroundColor: config.colors.success
                    },
                    {
                        data: [2.5, 3, 3.9, 4.3, 5, 5.2, 5.5, 6, 6.2, 6.5, 6.7, 6.8, 7, 7.2, 7.3, 7.5, 7.7, 7.8, 8, 8.2, 8.3, 8.5, 8.7, 8.8, 9],
                        label: 'Garis Merah',
                        borderColor: config.colors.danger,
                        tension: 0.5,
                        pointStyle: 'circle',
                        backgroundColor: config.colors.danger,
                        fill: false,
                        pointRadius: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 5,
                        pointBorderColor: 'transparent',
                        pointHoverBorderColor: cardColor,
                        pointHoverBackgroundColor: config.colors.danger
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        grid: {
                            color: borderColor,
                            drawBorder: false,
                            borderColor: borderColor
                        },
                        ticks: {
                            color: labelColor
                        }
                    },
                    y: {
                        scaleLabel: {
                            display: true
                        },
                        min: 0,
                        max: 18,
                        ticks: {
                            color: labelColor,
                            stepSize: 1
                        },
                        grid: {
                            color: borderColor,
                            drawBorder: false,
                            borderColor: borderColor
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        // Updated default tooltip UI
                        rtl: isRtl,
                        backgroundColor: cardColor,
                        titleColor: headingColor,
                        bodyColor: legendColor,
                        borderWidth: 1,
                        borderColor: borderColor
                    },
                    legend: {
                        position: 'top',
                        align: 'start',
                        rtl: isRtl,
                        labels: {
                            font: {
                                family: 'Inter'
                            },
                            usePointStyle: true,
                            padding: 35,
                            boxWidth: 6,
                            boxHeight: 6,
                            color: legendColor
                        }
                    }
                }
            }
        });
    }
})();