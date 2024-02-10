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
    darkRed = '#401612',
    lightRed = '#e63f30',
    lightYellow = '#ebe42a',
    lightGreen = '#afed7b',
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
    fetch('/get-riwayat-kunjungan-chart')
        .then(response => response.json())
        .then(data => {
            // Handle the data in your JavaScript
            var resultListTercatat = [];
            var resultListTerdaftar = [];

            for (var month in data.list_tercatat) {
                if (data.list_tercatat.hasOwnProperty(month)) {
                    resultListTercatat.push(data.list_tercatat[month]);
                }
            }

            for (var month in data.list_terdaftar) {
                if (data.list_terdaftar.hasOwnProperty(month)) {
                    resultListTerdaftar.push(data.list_terdaftar[month]);
                }
            }

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
                        data: resultListTerdaftar,
                        color: config.colors.primary
                    },
                    {
                        name: 'Tercatat',
                        type: 'line',
                        data: resultListTercatat,
                        color: config.colors.info
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
        });

    
    // Line Chart
    // --------------------------------------------------------------------
    
    const lineChart = document.getElementById('lineChartBeratBadanLL');
    if (lineChart) {
        const lineChartVar = new Chart(lineChart, {
            type: 'line',
            data: {
                labels: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 
                    31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60],
                datasets: [
                    {
                        data: [2.1, 2.9, 3.8, 4.4, 4.9, 5.3, 5.7, 5.9, 6.2, 6.4, 6.6, 6.8, 6.9, 7.1, 7.2, 7.4, 7.5, 7.7, 7.8, 8.0, 8.1, 8.2, 8.4, 8.5, 8.6, 8.8, 8.9, 9.0, 9.1, 9.2, 9.4, 9.5, 9.6, 9.7, 9.8, 9.9, 10.0, 10.1, 10.2, 10.3, 10.4, 10.5, 10.6, 10.7, 10.8, 10.9, 11.0, 11.1, 11.2, 11.3, 11.4, 11.5, 11.6, 11.7, 11.8, 11.9, 12.0, 12.1, 12.2, 12.3, 12.4],
                        label: 'Garis Merah Gelap',
                        borderColor: darkRed,
                        tension: 0.5,
                        pointStyle: 'circle',
                        backgroundColor: darkRed,
                        fill: false,
                        pointRadius: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 5,
                        pointBorderColor: 'transparent',
                        pointHoverBorderColor: cardColor,
                        pointHoverBackgroundColor: darkRed
                    },
                    {
                        data: [2.5, 3.4, 4.3, 5.0, 5.6, 6.0, 6.4, 6.7, 6.9, 7.1, 7.4, 7.6, 7.7, 7.9, 8.1, 8.3, 8.4, 8.6, 8.8, 8.9, 9.1, 9.2, 9.4, 9.5, 9.7, 9.8, 10.0, 10.1, 10.2, 10.4, 10.5, 10.7, 10.8, 10.9, 11.0, 11.2, 11.3, 11.4, 11.5, 11.6, 11.8, 11.9, 12.0, 12.1, 12.2, 12.4, 12.5, 12.6, 12.7, 12.8, 12.9, 13.1, 13.2, 13.3, 13.4, 13.5, 13.6, 13.7, 13.8, 14.0, 14.1],
                        label: 'Garis Merah',
                        borderColor: lightRed,
                        tension: 0.5,
                        pointStyle: 'circle',
                        backgroundColor: lightRed,
                        fill: false,
                        pointRadius: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 5,
                        pointBorderColor: 'transparent',
                        pointHoverBorderColor: cardColor,
                        pointHoverBackgroundColor: lightRed
                    },
                    {
                        data: [2.9, 3.9, 4.9, 5.7, 6.2, 6.7, 7.1, 7.4, 7.7, 8.0, 8.2, 8.4, 8.6, 8.8, 9.0, 9.2, 9.4, 9.6, 9.8, 10.0, 10.1, 10.3, 10.5, 10.7, 10.8, 11.0, 11.2, 11.3, 11.5, 11.7, 11.8, 12.0, 12.1, 12.3, 12.4, 12.6, 12.7, 12.9, 13.0, 13.1, 13.3, 13.4, 13.6, 13.7, 13.8, 14.0, 14.1, 14.3, 14.4, 14.5, 14.7, 14.8, 15.0, 15.1, 15.2, 15.4, 15.5, 15.6, 15.8, 15.9, 16.0],
                        label: 'Garis Kuning',
                        borderColor: lightYellow,
                        tension: 0.5,
                        pointStyle: 'circle',
                        backgroundColor: lightYellow,
                        fill: false,
                        pointRadius: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 5,
                        pointBorderColor: 'transparent',
                        pointHoverBorderColor: cardColor,
                        pointHoverBackgroundColor: lightYellow
                    },
                    {
                        data: [3.3, 4.5, 5.6, 6.4, 7.0, 7.5, 7.9, 8.3, 8.6, 8.9, 9.2, 9.4, 9.6, 9.9, 10.1, 10.3, 10.5, 10.7, 10.9, 11.1, 11.3, 11.5, 11.8, 12.0, 12.2, 12.4, 12.5, 12.7, 12.9, 13.1, 13.3, 13.5, 13.7, 13.8, 14.0, 14.2, 14.3, 14.5, 14.7, 14.8, 15.0, 15.2, 15.3, 15.5, 15.7, 15.8, 16.0, 16.2, 16.3, 16.5, 16.7, 16.8, 17.0, 17.2, 17.3, 17.5, 17.7, 17.8, 18.0, 18.2, 18.3],
                        label: 'Garis Hijau',
                        borderColor: lightGreen,
                        tension: 0.5,
                        pointStyle: 'circle',
                        backgroundColor: lightGreen,
                        fill: false,
                        pointRadius: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 5,
                        pointBorderColor: 'transparent',
                        pointHoverBorderColor: cardColor,
                        pointHoverBackgroundColor: lightGreen
                    },
                    {
                        data: [3.9, 5.1, 6.3, 7.2, 7.8, 8.4, 8.8, 9.2, 9.6, 9.9, 10.2, 10.5, 10.8, 11.0, 11.3, 11.5, 11.7, 12.0, 12.2, 12.5, 12.7, 12.9, 13.2, 13.4, 13.6, 13.9, 14.1, 14.3, 14.5, 14.8, 15.0, 15.2, 15.4, 15.6, 15.8, 16.0, 16.2, 16.4, 16.6, 16.8, 17.0, 17.2, 17.4, 17.6, 17.8, 18.0, 18.2, 18.4, 18.6, 18.8, 19.0, 19.2, 19.4, 19.6, 19.8, 20.0, 20.2, 20.4, 20.6, 20.8, 21.0],
                        label: 'Garis Kuning',
                        borderColor: lightYellow,
                        tension: 0.5,
                        pointStyle: 'circle',
                        backgroundColor: lightYellow,
                        fill: false,
                        pointRadius: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 5,
                        pointBorderColor: 'transparent',
                        pointHoverBorderColor: cardColor,
                        pointHoverBackgroundColor: lightYellow
                    },
                    {
                        data: [4.4, 5.8, 7.1, 8.0, 8.7, 9.3, 9.8, 10.3, 10.7, 11.0, 11.4, 11.7, 12.0, 12.3, 12.6, 12.8, 13.1, 13.4, 13.7, 13.9, 14.2, 14.5, 14.7, 15.0, 15.3, 15.5, 15.8, 16.1, 16.3, 16.6, 16.9, 17.1, 17.4, 17.6, 17.8, 18.1, 18.3, 18.6, 18.8, 19.0, 19.3, 19.5, 19.7, 20.0, 20.2, 20.5, 20.7, 20.9, 21.2, 21.4, 21.7, 21.9, 22.2, 22.4, 22.7, 22.9, 23.2, 23.4, 23.7, 23.9, 24.2],
                        label: 'Garis Merah',
                        borderColor: lightRed,
                        tension: 0.5,
                        pointStyle: 'circle',
                        backgroundColor: lightRed,
                        fill: false,
                        pointRadius: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 5,
                        pointBorderColor: 'transparent',
                        pointHoverBorderColor: cardColor,
                        pointHoverBackgroundColor: lightRed
                    },
                    {
                        data: [5.0, 6.6, 8.0, 9.0, 9.7, 10.4, 10.9, 11.4, 11.9, 12.3, 12.7, 13.0, 13.3, 13.7, 14.0, 14.3, 14.6, 14.9, 15.3, 15.6, 15.9, 16.2, 16.5, 16.8, 17.1, 17.5, 17.8, 18.1, 18.4, 18.7, 19.0, 19.3, 19.6, 19.9, 20.2, 20.4, 20.7, 21.0, 21.3, 21.6, 21.9, 22.1, 22.4, 22.7, 23.0, 23.3, 23.6, 23.9, 24.2, 24.5, 24.8, 25.1, 25.4, 25.7, 26.0, 26.3, 26.6, 26.9, 27.2, 27.6, 27.9],
                        label: 'Garis Merah Gelap',
                        borderColor: darkRed,
                        tension: 0.5,
                        pointStyle: 'circle',
                        backgroundColor: darkRed,
                        fill: false,
                        pointRadius: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 5,
                        pointBorderColor: 'transparent',
                        pointHoverBorderColor: cardColor,
                        pointHoverBackgroundColor: darkRed
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
                            display: true,
                        },
                        min: 0,
                        max: 30,
                        ticks: {
                            color: labelColor,
                            stepSize: 5
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

    const lineChartPerempuan = document.getElementById('lineChartBeratBadanPP');
    if (lineChartPerempuan) {
        const lineChartPerempuanVar = new Chart(lineChartPerempuan, {
            type: 'line',
            data: {
                labels: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 
                    31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60],
                datasets: [
                    {
                        data: [2.0, 2.7, 3.4, 4.0, 4.4, 4.8, 5.1, 5.3, 5.6, 5.8, 5.9, 6.1, 6.3, 6.4, 6.6, 6.7, 6.9, 7.0, 7.2, 7.3, 7.5, 7.6, 7.8, 7.9, 8.1, 8.2, 8.4, 8.5, 8.6, 8.8, 8.9, 9.0, 9.1, 9.3, 9.4, 9.5, 9.6, 9.7, 9.8, 9.9, 10.1, 10.2, 10.3, 10.4, 10.5, 10.6, 10.7, 10.8, 10.9, 11.0, 11.1, 11.2, 11.3, 11.4, 11.5, 11.6, 11.7, 11.8, 11.9, 12.0, 12.1],
                        label: 'Garis Merah Gelap',
                        borderColor: darkRed,
                        tension: 0.5,
                        pointStyle: 'circle',
                        backgroundColor: darkRed,
                        fill: false,
                        pointRadius: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 5,
                        pointBorderColor: 'transparent',
                        pointHoverBorderColor: cardColor,
                        pointHoverBackgroundColor: darkRed
                    },
                    {
                        data: [2.4, 3.2, 3.9, 4.5, 5.0, 5.4, 5.7, 6.0, 6.3, 6.5, 6.7, 6.9, 7.0, 7.2, 7.4, 7.6, 7.7, 7.9, 8.1, 8.2, 8.4, 8.6, 8.7, 8.9, 9.0, 9.2, 9.4, 9.5, 9.7, 9.8, 10.0, 10.1, 10.3, 10.4, 10.5, 10.7, 10.8, 10.9, 11.1, 11.2, 11.3, 11.5, 11.6, 11.7, 11.8, 12.0, 12.1, 12.2, 12.3, 12.4, 12.6, 12.7, 12.8, 12.9, 13.0, 13.2, 13.3, 13.4, 13.5, 13.6, 13.7],
                        label: 'Garis Merah',
                        borderColor: lightRed,
                        tension: 0.5,
                        pointStyle: 'circle',
                        backgroundColor: lightRed,
                        fill: false,
                        pointRadius: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 5,
                        pointBorderColor: 'transparent',
                        pointHoverBorderColor: cardColor,
                        pointHoverBackgroundColor: lightRed
                    },
                    {
                        data: [2.8, 3.6, 4.5, 5.2, 5.7, 6.1, 6.5, 6.8, 7.0, 7.3, 7.5, 7.7, 7.9, 8.1, 8.3, 8.5, 8.7, 8.9, 9.1, 9.2, 9.4, 9.6, 9.8, 10.0, 10.2, 10.3, 10.5, 10.7, 10.9, 11.1, 11.2, 11.4, 11.6, 11.7, 11.9, 12.0, 12.2, 12.4, 12.5, 12.7, 12.8, 13.0, 13.1, 13.3, 13.4, 13.6, 13.7, 13.9, 14.0, 14.2, 14.3, 14.5, 14.6, 14.8, 14.9, 15.1, 15.2, 15.3, 15.5, 15.6, 15.8],
                        label: 'Garis Kuning',
                        borderColor: lightYellow,
                        tension: 0.5,
                        pointStyle: 'circle',
                        backgroundColor: lightYellow,
                        fill: false,
                        pointRadius: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 5,
                        pointBorderColor: 'transparent',
                        pointHoverBorderColor: cardColor,
                        pointHoverBackgroundColor: lightYellow
                    },
                    {
                        data: [3.2, 4.2, 5.1, 5.8, 6.4, 6.9, 7.3, 7.6, 7.9, 8.2, 8.5, 8.7, 8.9, 9.2, 9.4, 9.6, 9.8, 10.0, 10.2, 10.4, 10.6, 10.9, 11.1, 11.3, 11.5, 11.7, 11.9, 12.1, 12.3, 12.5, 12.7, 12.9, 13.1, 13.3, 13.5, 13.7, 13.9, 14.0, 14.2, 14.4, 14.6, 14.8, 15.0, 15.2, 15.3, 15.5, 15.7, 15.9, 16.1, 16.3, 16.4, 16.6, 16.8, 17.0, 17.2, 17.3, 17.5, 17.7, 17.9, 18.0, 18.2],
                        label: 'Garis Hijau',
                        borderColor: lightGreen,
                        tension: 0.5,
                        pointStyle: 'circle',
                        backgroundColor: lightGreen,
                        fill: false,
                        pointRadius: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 5,
                        pointBorderColor: 'transparent',
                        pointHoverBorderColor: cardColor,
                        pointHoverBackgroundColor: lightGreen
                    },
                    {
                        data: [3.7, 4.8, 5.8, 6.6, 7.3, 7.8, 8.2, 8.6, 9.0, 9.3, 9.6, 9.9, 10.1, 10.4, 10.6, 10.9, 11.1, 11.4, 11.6, 11.8, 12.1, 12.3, 12.5, 12.8, 13.0, 13.3, 13.5, 13.7, 14.0, 14.2, 14.4, 14.7, 14.9, 15.1, 15.4, 15.6, 15.8, 16.0, 16.3, 16.5, 16.7, 16.9, 17.2, 17.4, 17.6, 17.8, 18.1, 18.3, 18.5, 18.8, 19.0, 19.2, 19.4, 19.7, 19.9, 20.1, 20.3, 20.6, 20.8, 21.0, 21.2],
                        label: 'Garis Kuning',
                        borderColor: lightYellow,
                        tension: 0.5,
                        pointStyle: 'circle',
                        backgroundColor: lightYellow,
                        fill: false,
                        pointRadius: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 5,
                        pointBorderColor: 'transparent',
                        pointHoverBorderColor: cardColor,
                        pointHoverBackgroundColor: lightYellow
                    },
                    {
                        data: [4.2, 5.5, 6.6, 7.5, 8.2, 8.8, 9.3, 9.8, 10.2, 10.5, 10.9, 11.2, 11.5, 11.8, 12.1, 12.4, 12.6, 12.9, 13.2, 13.5, 13.7, 14.0, 14.3, 14.6, 14.8, 15.1, 15.4, 15.7, 16.0, 16.2, 16.5, 16.8, 17.1, 17.3, 17.6, 17.9, 18.1, 18.4, 18.7, 19.0, 19.2, 19.5, 19.8, 20.1, 20.4, 20.7, 20.9, 21.2, 21.5, 21.8, 22.1, 22.4, 22.6, 22.9, 23.2, 23.5, 23.8, 24.1, 24.4, 24.6, 24.9],
                        label: 'Garis Merah',
                        borderColor: lightRed,
                        tension: 0.5,
                        pointStyle: 'circle',
                        backgroundColor: lightRed,
                        fill: false,
                        pointRadius: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 5,
                        pointBorderColor: 'transparent',
                        pointHoverBorderColor: cardColor,
                        pointHoverBackgroundColor: lightRed
                    },
                    {
                        data: [4.8, 6.2, 7.5, 8.5, 9.3, 10.0, 10.6, 11.1, 11.6, 12.0, 12.4, 12.8, 13.1, 13.5, 13.8, 14.1, 14.5, 14.8, 15.1, 15.4, 15.7, 16.0, 16.4, 16.7, 17.0, 17.3, 17.7, 18.0, 18.3, 18.7, 19.0, 19.3, 19.6, 20.0, 20.3, 20.6, 20.9, 21.3, 21.6, 22.0, 22.3, 22.7, 23.0, 23.4, 23.7, 24.1, 24.5, 24.8, 25.2, 25.5, 25.9, 26.3, 26.6, 27.0, 27.4, 27.7, 28.1, 28.5, 28.8, 29.2, 29.5],
                        label: 'Garis Merah Gelap',
                        borderColor: darkRed,
                        tension: 0.5,
                        pointStyle: 'circle',
                        backgroundColor: darkRed,
                        fill: false,
                        pointRadius: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 5,
                        pointBorderColor: 'transparent',
                        pointHoverBorderColor: cardColor,
                        pointHoverBackgroundColor: darkRed
                    },
                    {
                        data: [0, 12.3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                        label: 'Berat Badan Balita',
                        borderColor: config.colors.greyLightColor,
                        tension: 0.5,
                        pointStyle: 'circle',
                        backgroundColor: config.colors.greyLightColor,
                        fill: false,
                        pointRadius: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderWidth: 5,
                        pointBorderColor: 'transparent',
                        pointHoverBorderColor: cardColor,
                        pointHoverBackgroundColor: config.colors.greyLightColor
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
                            display: true,
                        },
                        min: 0,
                        max: 30,
                        ticks: {
                            color: labelColor,
                            stepSize: 5
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