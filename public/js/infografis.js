const charts = {
    kelamin: {
      containerChart: '#chartjeniskelamin',
      render: function(data, tahun) {
        var options = {
            animationEnabled: true,
            theme: "dark2",
            exportEnabled: true,
          title: {
            text: `Tahun ${tahun}`,
            fontFamily: "poppins",
            fontSize: 18,
            fontWeight: "bold"
          },
          animationEnabled: true,
          data: [{
            type: "pie",
            startAngle: 40,
            toolTipContent: "<b>{label}</b>: {y}",
            showInLegend: true,
            legendText: "{label}",
            indexLabelFontSize: 14,
            indexLabelFontFamily: "poppins",
            indexLabelFontWeight: "bold",
            indexLabel: "{label} : {y}",
            dataPoints: [
              { y: data.laki, label: "Laki-laki" },
              { y: data.perempuan, label: "Perempuan" }
            ]
          }]
        };
        $(this.containerChart).CanvasJSChart(options);
        $(this.containerChart).css('color', '').css('font-style', '').css('display', 'block');
      },
      hasData: function(data) {
        return data && (data.laki > 0 || data.perempuan > 0);
      },
      showNoData: function(tahun) {
        $(this.containerChart).html(`Data Tidak Tersedia Untuk Tahun ${tahun}`);
        $(this.containerChart).css({
          'color': '#aaa',
          'font-style': 'italic',
          'font-size': '1.2rem',
          'display': 'flex',
          'justify-content': 'center',
          'align-items': 'center',
          'height': '300px',
          'border': '2px dashed #ccc',
          'border-radius': '10px',
          'background': 'white',
        });
      }
    },
  
    usia: {
        containerChart: '#chartusiapenduduk',
        render: function(data, tahun) {
          var options = {
            animationEnabled: true,
            theme: "dark2",
            exportEnabled: true,
            title: {
              text: `Tahun ${tahun}`,
              fontFamily: "poppins",
              fontSize: 18,
              fontWeight: "bold"
            },
            axisY: {
              title: "Jumlah Penduduk (dalam jiwa)",
              reversed: true,  
              labelFontSize: 12,
              labelFontFamily: "poppins",
                labelFontWeight: "bold",
              interval: 1,
              // Label usia dari data langsung, otomatis CanvasJS gunakan label dari dataPoints
            },
            axisX: {
              title: "Rentang Usia (dalam tahun)",
              labelFontSize: 12,
              labelFontFamily: "poppins",
                labelFontWeight: "bold",
              includeZero: true,
            },
            toolTip: {
              shared: true,
              

            },
            data: [
              {
                type: "bar",
                name: "Laki-laki",
                showInLegend: true,
                color: "#4F81BC",
                dataPoints: data.lakiDataPoints 
              },
              {
                type: "bar",
                name: "Perempuan",
                showInLegend: true,
                color: "#C0504E",
                dataPoints: data.perempuanDataPoints // [{ label: "0-5", y: 10 }, ...]
              }
            ]
          };
      
          $(this.containerChart).CanvasJSChart(options);
          $(this.containerChart).css({
            'color': '',
            'font-style': '',
            'display': 'block',
            'height': '400px',
            'border': 'none',
            'background': 'white'
          });
        },
        hasData: function(data) {
          return data 
            && Array.isArray(data.lakiDataPoints) && data.lakiDataPoints.length > 0 
            && Array.isArray(data.perempuanDataPoints) && data.perempuanDataPoints.length > 0;
        },
        showNoData: function(tahun) {
          $(this.containerChart).html(`Data Tidak Tersedia Untuk Tahun ${tahun}`);
          $(this.containerChart).css({
            'color': '#aaa',
            'font-style': 'italic',
            'font-size': '1.2rem',
            'display': 'flex',
            'justify-content': 'center',
            'align-items': 'center',
            'height': '300px',
            'border': '2px dashed #ccc',
            'border-radius': '10px',
            'background': 'white',
          });
        }
    },

    pendidikan: {
      containerChart: '#chartpendidikan',
      render: function(data, tahun) {
        
        const options = {
          animationEnabled: true,
          theme: "dark2",
          exportEnabled: true,
          title: {
            text: `Tahun ${tahun}`,
            fontFamily: "poppins",
            fontSize: 20,
            fontWeight: "bold"
          },
          axisX: {
            title: "Tingkat Pendidikan",
            labelFontSize: 12,
            labelFontFamily: "poppins",
            labelFontWeight: "bold",
            interval: 1,
          },
          axisY: {
            title: "Jumlah Penduduk (Jiwa)",
            includeZero: true,
            labelFontWeight: "bold",
            labelFontSize: 12,
            labelFontFamily: "poppins",
          },
          data: [{
            type: "column",
            indexLabelFontSize: 12,
            indexLabelFontFamily: "poppins",
            indexLabelFontWeight: "bold",
            indexLabel: "{y}",
            indexLabelPlacement: "inside",
            dataPoints: data.dataPoints 
          }]
        };
    
        $(this.containerChart).CanvasJSChart(options);
        $(this.containerChart).css({
          'color': '',
          'font-style': '',
          'display': 'block',
          'height': '400px',
          'border': 'none',
          'background': 'white'
        });
      },
      hasData: function(data) {
        return data && Array.isArray(data.dataPoints) && data.dataPoints.some(dp => dp.y > 0);
      },
      showNoData: function(tahun) {
        $(this.containerChart).html(`Data Tidak Tersedia Untuk Tahun ${tahun}`);
        $(this.containerChart).css({
          'color': '#aaa',
          'font-style': 'italic',
          'font-size': '1.2rem',
          'display': 'flex',
          'justify-content': 'center',
          'align-items': 'center',
          'height': '300px',
          'border': '2px dashed #ccc',
          'border-radius': '10px',
          'background': 'white',
        });
      }
    },

    agama: {
      containerChart: '#chartagama',
      render: function(data, tahun) {
        
        const options = {
          animationEnabled: true,
          theme: "dark2",
          exportEnabled: true,
          title: {
            text: `Tahun ${tahun}`,
            fontFamily: "poppins",
            fontSize: 20,
            fontWeight: "bold"
          },
          axisX: {
            title: "Agama dan Kepercayaan",
            labelFontSize: 12,
            labelFontFamily: "poppins",
            labelFontWeight: "bold",
            interval: 1,
          },
          axisY: {
            title: "Jumlah Penduduk (Jiwa)",
            includeZero: true,
            labelFontWeight: "bold",
            labelFontSize: 12,
            labelFontFamily: "poppins",
          },
          data: [{
            type: "column",
            indexLabelFontSize: 12,
            indexLabelFontFamily: "poppins",
            indexLabelFontWeight: "bold",
            indexLabel: "{y}",
            indexLabelPlacement: "inside",
            dataPoints: data.dataPoints 
          }]
        };
    
        $(this.containerChart).CanvasJSChart(options);
        $(this.containerChart).css({
          'color': '',
          'font-style': '',
          'display': 'block',
          'height': '400px',
          'border': 'none',
          'background': 'white'
        });
      },
      hasData: function(data) {
        return data && Array.isArray(data.dataPoints) && data.dataPoints.some(dp => dp.y > 0);
      },
      showNoData: function(tahun) {
        $(this.containerChart).html(`Data Tidak Tersedia Untuk Tahun ${tahun}`);
        $(this.containerChart).css({
          'color': '#aaa',
          'font-style': 'italic',
          'font-size': '1.2rem',
          'display': 'flex',
          'justify-content': 'center',
          'align-items': 'center',
          'height': '300px',
          'border': '2px dashed #ccc',
          'border-radius': '10px',
          'background': 'white',
        });
      }
    },

    perkawinan: {
      containerChart: '#chartperkawinan',
      render: function(data, tahun) {
        
        const options = {
          animationEnabled: true,
          theme: "dark2",
          exportEnabled: true,
          title: {
            text: `Tahun ${tahun}`,
            fontFamily: "poppins",
            fontSize: 20,
            fontWeight: "bold"
          },
          axisX: {
            title: "Status Perkawinan",
            labelFontSize: 12,
            labelFontFamily: "poppins",
            labelFontWeight: "bold",
            interval: 1,
          },
          axisY: {
            title: "Jumlah Penduduk (Jiwa)",
            includeZero: true,
            labelFontWeight: "bold",
            labelFontSize: 12,
            labelFontFamily: "poppins",
          },
          data: [{
            type: "column",
            indexLabelFontSize: 12,
            indexLabelFontFamily: "poppins",
            indexLabelFontWeight: "bold",
            indexLabel: "{y}",
            indexLabelPlacement: "inside",
            dataPoints: data.dataPoints 
          }]
        };
    
        $(this.containerChart).CanvasJSChart(options);
        $(this.containerChart).css({
          'color': '',
          'font-style': '',
          'display': 'block',
          'height': '400px',
          'border': 'none',
          'background': 'white'
        });
      },
      hasData: function(data) {
        return data && Array.isArray(data.dataPoints) && data.dataPoints.some(dp => dp.y > 0);
      },
      showNoData: function(tahun) {
        $(this.containerChart).html(`Data Tidak Tersedia Untuk Tahun ${tahun}`);
        $(this.containerChart).css({
          'color': '#aaa',
          'font-style': 'italic',
          'font-size': '1.2rem',
          'display': 'flex',
          'justify-content': 'center',
          'align-items': 'center',
          'height': '300px',
          'border': '2px dashed #ccc',
          'border-radius': '10px',
          'background': 'white',
        });
      }
    },

    pekerjaan: {
      containerChart: '#chartpekerjaan',
      render: function(data, tahun) {
        
        const options = {
          animationEnabled: true,
          theme: "dark2",
          exportEnabled: true,
          title: {
            text: `Tahun ${tahun}`,
            fontFamily: "poppins",
            fontSize: 20,
            fontWeight: "bold"
          },
          axisX: {
            title: "Status Perkawinan",
            labelFontSize: 12,
            labelFontFamily: "poppins",
            labelFontWeight: "bold",
            interval: 1,
          },
          axisY: {
            title: "Jumlah Penduduk (Jiwa)",
            includeZero: true,
            labelFontWeight: "bold",
            labelFontSize: 12,
            labelFontFamily: "poppins",
          },
          data: [{
            type: "column",
            indexLabelFontSize: 12,
            indexLabelFontFamily: "poppins",
            indexLabelFontWeight: "bold",
            indexLabel: "{y}",
            indexLabelPlacement: "inside",
            dataPoints: data.dataPoints 
          }]
        };
    
        $(this.containerChart).CanvasJSChart(options);
        $(this.containerChart).css({
          'color': '',
          'font-style': '',
          'display': 'block',
          'height': '400px',
          'border': 'none',
          'background': 'white'
        });
      },
      hasData: function(data) {
        return data && Array.isArray(data.dataPoints) && data.dataPoints.some(dp => dp.y > 0);
      },
      showNoData: function(tahun) {
        $(this.containerChart).html(`Data Tidak Tersedia Untuk Tahun ${tahun}`);
        $(this.containerChart).css({
          'color': '#aaa',
          'font-style': 'italic',
          'font-size': '1.2rem',
          'display': 'flex',
          'justify-content': 'center',
          'align-items': 'center',
          'height': '300px',
          'border': '2px dashed #ccc',
          'border-radius': '10px',
          'background': 'white',
        });
      }
    },
    
  };
  
  function fetchChartData(chartKey, tahun) {
    return fetch(`/infografis/penduduk/data/${chartKey}/${tahun}`)
      .then(response => {
        if (!response.ok) throw new Error("Data tidak tersedia untuk tahun");
        return response.json();
      });
  }
  
  function updateCharts(tahun) {
    Object.keys(charts).forEach(key => {
      const chart = charts[key];
  
      fetchChartData(key, tahun)
        .then(data => {
          if (chart.hasData(data)) {
            chart.render(data, tahun);
          } else {
            chart.showNoData(tahun);
          }
        })
        .catch(() => {
          chart.showNoData(tahun);
        });
    });
  }
  
  window.onload = function () {
    const defaultTahun = document.getElementById('tahunSelect').value;
    updateCharts(defaultTahun);
  };
  
  function filterTahun() {
    const selectedTahun = document.getElementById('tahunSelect').value;
    updateCharts(selectedTahun);
  }
  