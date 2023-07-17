/* Imports */
import * as am5 from "@amcharts/amcharts5";
import * as am5map from "@amcharts/amcharts5/map";

import am5geodata_brazilLow from "@amcharts/amcharts5-geodata/brazilLow";
import am5themes_Animated from "@amcharts/amcharts5/themes/Animated";

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

polygonSeries.data.setAll([
    {
        "id": "BR-SP",
        "value": 2287
    },
    {
        "id": "BR-MG",
        "value": 1948
    },
    {
        "id": "BR-PR",
        "value": 540
    },
    {
        "id": "BR-SC",
        "value": 243
    },
    {
        "id": "BR-GO",
        "value": 193
    },
    {
        "id": "BR-ES",
        "value": 156
    },
    {
        "id": "BR-RS",
        "value": 138
    },
    {
        "id": "BR-MT",
        "value": 112
    },
    {
        "id": "BR-BA",
        "value": 101
    },
    {
        "id": "BR-MS",
        "value": 89
    },
    {
        "id": "BR-RO",
        "value": 35
    },
    {
        "id": "BR-PA",
        "value": 29
    },
    {
        "id": "BR-RJ",
        "value": 28
    },
    {
        "id": "BR-TO",
        "value": 19
    },
    {
        "id": "BR-AL",
        "value": 18
    },
    {
        "id": "BR-DF",
        "value": 16
    },
    {
        "id": "BR-CE",
        "value": 13
    },
    {
        "id": "BR-MA",
        "value": 11
    },
    {
        "id": "BR-PE",
        "value": 11
    },
    {
        "id": "BR-SE",
        "value": 10
    },
    {
        "id": "BR-PI",
        "value": 6
    },
    {
        "id": "BR-RN",
        "value": 6
    },
    {
        "id": "BR-AM",
        "value": 6
    },
    {
        "id": "BR-PB",
        "value": 5
    },
    {
        "id": "BR-RR",
        "value": 5
    },
    {
        "id": "BR-AC",
        "value": 4
    }
])

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