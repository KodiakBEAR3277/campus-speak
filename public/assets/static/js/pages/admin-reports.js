(function(){
  function getJSON(el, name){ try { return JSON.parse(el.getAttribute(name)||'{}'); } catch(e){ return {}; } }
  document.addEventListener('DOMContentLoaded', function(){
    var holder = document.getElementById('reportsData');
    if (!holder) return;
    var trend = getJSON(holder, 'data-trend');
    var bycat = getJSON(holder, 'data-bycategory');
    var bystatus = getJSON(holder, 'data-bystatus');
    var dist = getJSON(holder, 'data-distribution');

    if (window.ApexCharts) {
      var trendEl = document.getElementById('repTrend');
      if (trendEl) {
        var line = new ApexCharts(trendEl, {
          chart: { type: 'line', height: 300 },
          series: [{ name: 'Complaints', data: trend.values||[] }],
          xaxis: { categories: trend.labels||[] }
        });
        line.render();
      }

      var catEl = document.getElementById('repCategoryChart');
      if (catEl && Array.isArray(bycat)) {
        var labels = bycat.map(function(c){return c.label;});
        var series = bycat.map(function(c){return c.count;});
        var bar = new ApexCharts(catEl, {
          chart: { type: 'bar', height: 300 },
          series: [{ name: 'Complaints', data: series }],
          xaxis: { categories: labels }
        });
        bar.render();
      }

      var statusEl = document.getElementById('repStatusChart');
      if (statusEl && Array.isArray(bystatus)) {
        var slabels = bystatus.map(function(s){return s.label;});
        var sseries = bystatus.map(function(s){return s.count;});
        var pie = new ApexCharts(statusEl, { chart: { type: 'donut', height: 300 }, labels: slabels, series: sseries });
        pie.render();
      }

      var distCatEl = document.getElementById('repDistCategory');
      if (distCatEl && dist && Array.isArray(dist.category_percent)) {
        var dlabels = ['Academic','Facility','Bullying','Other'];
        var dpie = new ApexCharts(distCatEl, { chart: { type: 'pie', height: 260 }, labels: dlabels, series: dist.category_percent });
        dpie.render();
      }

      var anonymityEl = document.getElementById('repAnonymity');
      if (anonymityEl && dist && Array.isArray(dist.anonymity)) {
        var alabels = dist.anonymity.map(function(a){return a.label;});
        var aseries = dist.anonymity.map(function(a){return a.count;});
        var donut = new ApexCharts(anonymityEl, { chart: { type: 'donut', height: 260 }, labels: alabels, series: aseries });
        donut.render();
      }
    }
  });
})();


