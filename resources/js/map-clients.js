/* Imports */
import * as am5 from "@amcharts/amcharts5";
import * as am5map from "@amcharts/amcharts5/map";

import am5geodata_brazilLow from "@amcharts/amcharts5-geodata/brazilLow";
import am5themes_Animated from "@amcharts/amcharts5/themes/Animated";

$.get("http://127.0.0.1:8000/api/clients-to-chart", function (clients, status) {

    // Create root
    let root = am5.Root.new("mapdiv");

    // Set themes
    root.setThemes([
        am5themes_Animated.new(root)
    ]);

    // Create chart
    let chart = root.container.children.push(am5map.MapChart.new(root, {
        panX: "rotateX",
        panY: "none",
        projection: am5map.geoMercator(),
        layout: root.horizontalLayout
    }));

    // Create polygon series
    let polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
        geoJSON: am5geodata_brazilLow,
        valueField: "value",
        calculateAggregates: true
    }));

    polygonSeries.mapPolygons.template.setAll({
        tooltipText: "{name}: {value}"
    });

    polygonSeries.set("heatRules", [{
        target: polygonSeries.mapPolygons.template,
        dataField: "value",
        min: am5.color(0xe6a8a3),
        max: am5.color(0xd71921),
        key: "fill"
    }]);

    polygonSeries.mapPolygons.template.events.on("pointerover", function (ev) {
        heatLegend.showValue(ev.target.dataItem.get("value"));
    });

    polygonSeries.data.setAll(clients)

    let heatLegend = chart.children.push(am5.HeatLegend.new(root, {
        orientation: "vertical",
        startColor: am5.color(0xe6a8a3),
        endColor: am5.color(0xd71921),
        startText: "Baixo",
        endText: "Alto",
        stepCount: 1
    }));

    heatLegend.startLabel.setAll({
        fontSize: 12,
        fill: heatLegend.get("startColor")
    });

    heatLegend.endLabel.setAll({
        fontSize: 12,
        fill: heatLegend.get("endColor")
    });

    // change this to template when possible
    polygonSeries.events.on("datavalidated", function () {
        heatLegend.set("startValue", polygonSeries.getPrivate("valueLow"));
        heatLegend.set("endValue", polygonSeries.getPrivate("valueHigh"));
    });

});