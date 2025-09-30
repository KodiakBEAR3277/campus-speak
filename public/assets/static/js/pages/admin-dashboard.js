(function() {
    function getDataAttrJSON(el, name) {
        try { return JSON.parse(el.getAttribute(name) || '{}'); } catch(e) { return {}; }
    }

    document.addEventListener('DOMContentLoaded', function() {
        var source = document.getElementById('adminDashData');
        if (!source) return;
        var categories = getDataAttrJSON(source, 'data-categories');
        var trend = getDataAttrJSON(source, 'data-trend');

        var categoryEl = document.querySelector('#chartCategories');
        if (categoryEl && window.ApexCharts && Array.isArray(categories)) {
            var labels = categories.map(function(c){ return c.label; });
            var series = categories.map(function(c){ return c.count; });
            var pie = new ApexCharts(categoryEl, {
                chart: { type: 'pie', height: 300 },
                labels: labels,
                series: series
            });
            pie.render();
        }

        var trendEl = document.querySelector('#chartTrend');
        if (trendEl && window.ApexCharts && trend && Array.isArray(trend.labels)) {
            var line = new ApexCharts(trendEl, {
                chart: { type: 'line', height: 300 },
                series: [{ name: 'Complaints', data: trend.values || [] }],
                xaxis: { categories: trend.labels }
            });
            line.render();
        }
    });
})();


