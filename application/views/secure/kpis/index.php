<?php
    defined('BASEPATH') or exit('No direct script access allowed');
?>
<script src="<?php echo site_url('assets/vendor/apexcharts/dist/apexcharts.min.js'); ?>" type="text/javascript"></script>



<div class="clearfix position-relative pt-2 pb-4">
	<div class="container">
		
		<div class="highlight">

		<div class="row">
			<div class="col-4">
				<div class="card">
					<div class="card-header">Articles Published
						<div class="float-right">
							<select class="form-control form-control-sm">
								<option>Select User</option>
							</select>
						</div>
					</div>
					<div class="card-body">
						<div id="publishedChart"></div>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
				<div class="card-header">Content Score
					<div class="float-right">
							<select class="form-control form-control-sm">
								<option>Select User</option>
							</select>
					</div>
				</div>
					<div class="card-body">
						<div id="contentScoreChart"></div>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
				<div class="card-header">Conversions
					<div class="float-right">
							<select class="form-control form-control-sm">
								<option>Select User</option>
							</select>
					</div>
				</div>
					<div class="card-body">
						<div id="conversionsChart"></div>
					</div>
				</div>
			</div>
     	</div> 
		 <div class="row">
			<div class="col-4">
				<div class="card">
				<div class="card-header">Rank Index
					<div class="float-right">
							<select class="form-control form-control-sm">
								<option>Select User</option>
							</select>
					</div>
				</div>
					<div class="card-body">
						<div id="rankIndexChart"></div>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
				<div class="card-header">Link Building
					<div class="float-right">
							<select class="form-control form-control-sm">
								<option>Select User</option>
							</select>
					</div>
				</div>
					<div class="card-body">
					<div id="linkBuildingChart"></div>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
				<div class="card-header">Traffic
					<div class="float-right">
							<select class="form-control form-control-sm">
								<option>Select Website</option>
							</select>
					</div>
				</div>
					<div class="card-body">
						<div id="trafficChart"></div>
					</div>
				</div>
			</div>
     	</div>     
					
		</div>
		
	</div>
</div>
<script>
        var options = {
          series: [{
          name: 'Articles Published',
          type: 'column',
          data: [10, 5, 15, 20, 12, 17, 8, 13, 4, 16, 7, 18]
        }],
          chart: {
		   toolbar:{
			 show: false
			},
          height: 250,
          type: 'bar',
          stacked: false
        },
        dataLabels: {
          enabled: false
        },
       
        xaxis: {
          categories: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
        },
        yaxis: [
          {
            axisTicks: {
              show: true,
            },
            axisBorder: {
              show: true,
              color: '#008FFB'
            },
            labels: {
              style: {
                colors: '#008FFB',
              }
            },
            tooltip: {
              enabled: true
            }
          },
          
        ],
        tooltip: {
          fixed: {
            enabled: true,
            position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
            offsetY: 30,
            offsetX: 60
          },
        },
        legend: {
		  show: false,
          horizontalAlign: 'left',
          offsetX: 40
		},
		annotations: {
			yaxis: [
				{
				y: 10,
				borderColor: '#feb019',
				label: {
					borderColor: '#feb019',
					style: {
					color: '#fff',
					background: '#feb019'
					}
				}
				}
			]
		}
		
        };

        var chart = new ApexCharts(document.querySelector("#publishedChart"), options);
		chart.render();
		
		var cs_options = {
          series: [76],
          chart: {
		  height: 250,
          type: 'radialBar',
          offsetY: -20,
          sparkline: {
            enabled: true
          }
        },
        plotOptions: {
          radialBar: {
            startAngle: -90,
            endAngle: 90,
            track: {
              background: "#e7e7e7",
              strokeWidth: '97%',
              margin: 5, // margin is in pixels
              dropShadow: {
                enabled: true,
                top: 2,
                left: 0,
                color: '#999',
                opacity: 1,
                blur: 2
              }
            },
            dataLabels: {
              name: {
                show: false
              },
              value: {
                offsetY: -2,
                fontSize: '22px'
              }
            }
          }
        },
        grid: {
          padding: {
            top: -10
          }
        },
        fill: {
          type: 'gradient',
          gradient: {
            shade: 'light',
            shadeIntensity: 0.4,
            inverseColors: false,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 50, 53, 91]
          },
        },
        labels: ['Average Results'],
        };

        var cs_chart = new ApexCharts(document.querySelector("#contentScoreChart"), cs_options);
		cs_chart.render();
		

		var conversions_options = {
          series: [{
          name: 'Articles Published',
          type: 'column',
          data: [10, 5, 15, 20, 12, 17, 8, 13, 4, 16, 7, 18]
        }],
          chart: {
		   toolbar:{
			 show: false
			},
          height: 250,
          type: 'bar',
          stacked: false
		},
		fill: {
		colors: ['#00e396']
		},
        dataLabels: {
          enabled: false
        },
       
        xaxis: {
          categories: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
        },
        yaxis: [
          {
            axisTicks: {
              show: true,
            },
            axisBorder: {
              show: true,
              color: '#00e396'
            },
            labels: {
              style: {
                colors: '#00e396',
              }
            },
            tooltip: {
              enabled: true
            }
          },
          
        ],
        tooltip: {
          fixed: {
            enabled: true,
            position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
            offsetY: 30,
            offsetX: 60
          },
        },
        legend: {
		  show: false,
          horizontalAlign: 'left',
          offsetX: 40
		},
		annotations: {
			yaxis: [
				{
				y: 10,
				borderColor: '#feb019',
				label: {
					borderColor: '#feb019',
					style: {
					color: '#fff',
					background: '#feb019'
					}
				}
				}
			]
		}
		
        };

        var conversions_chart = new ApexCharts(document.querySelector("#conversionsChart"), conversions_options);
		conversions_chart.render();


		var ri_options = {
          series: [76],
          chart: {
		  height: 250,
          type: 'radialBar',
          offsetY: -20,
          sparkline: {
            enabled: true
          }
        },
        plotOptions: {
          radialBar: {
            startAngle: -90,
            endAngle: 90,
            track: {
              background: "#e7e7e7",
              strokeWidth: '97%',
              margin: 5, // margin is in pixels
              dropShadow: {
                enabled: true,
                top: 2,
                left: 0,
                color: '#999',
                opacity: 1,
                blur: 2
              }
            },
            dataLabels: {
              name: {
                show: false
              },
              value: {
                offsetY: -2,
                fontSize: '22px'
              }
            }
          }
        },
        grid: {
          padding: {
            top: -10
          }
        },
        fill: {
          type: 'gradient',
          gradient: {
            shade: 'light',
            shadeIntensity: 0.4,
            inverseColors: false,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 50, 53, 91]
          },
        },
        labels: ['Average Results'],
        };

        var ri_chart = new ApexCharts(document.querySelector("#rankIndexChart"), ri_options);
		ri_chart.render();

		var lb_options = {
          series: [{
          name: 'Articles Published',
          type: 'column',
          data: [10, 5, 15, 20, 12, 17, 8, 13, 4, 16, 7, 18]
        }],
          chart: {
		   toolbar:{
			 show: false
			},
          height: 250,
          type: 'bar',
          stacked: false
		},
		fill: {
			colors: ['#F44336']
		},
        dataLabels: {
          enabled: false
        },
       
        xaxis: {
          categories: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
        },
        yaxis: [
          {
            axisTicks: {
              show: true,
            },
            axisBorder: {
              show: true,
              color: '#F44336'
            },
            labels: {
              style: {
                colors: '#F44336',
              }
            },
            tooltip: {
              enabled: true
            }
          },
          
        ],
        tooltip: {
          fixed: {
            enabled: true,
            position: 'topLeft', // topRight, topLeft, bottomRight, bottomLeft
            offsetY: 30,
            offsetX: 60
          },
        },
        legend: {
		  show: false,
          horizontalAlign: 'left',
          offsetX: 40
		},
		annotations: {
			yaxis: [
				{
				y: 20,
				borderColor: '#feb019',
				label: {
					borderColor: '#feb019',
					style: {
					color: '#fff',
					background: '#feb019'
					}
				}
				}
			]
		}
		
        };

        var lb_chart = new ApexCharts(document.querySelector("#linkBuildingChart"), lb_options);
		lb_chart.render();


		var t_options = {
          series: [{
            name: "Traffic",
            data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
          }
        ],
          chart: {
			toolbar:{
			 show: false
			},
          height: 250,
          type: 'line',
          zoom: {
            enabled: false
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: [5],
          curve: 'straight',
          dashArray: [5]
        },
        legend: {
		show: false,
          tooltipHoverFormatter: function(val, opts) {
            return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
          }
        },
        markers: {
          size: 0,
          hover: {
            sizeOffset: 6
          }
        },
        xaxis: {
          categories: [1, 2, 3, 4, 5, 6, 7, 8, 9,
            10, 11, 12
          ],
        },
        yaxis: [
          {
            axisTicks: {
              show: true,
            },
            axisBorder: {
              show: true,
              color: '#008FFB'
            },
            labels: {
              style: {
                colors: '#008FFB',
              }
            },
            tooltip: {
              enabled: true
            }
          },
          
        ],
        tooltip: {
          y: [
            {
              title: {
                formatter: function (val) {
                  return val + " (%)"
                }
              }
            }
          ]
        },
        grid: {
          borderColor: '#f1f1f1',
        }
        };

        var t_chart = new ApexCharts(document.querySelector("#trafficChart"), t_options);
        t_chart.render();
      
      
    




</script>