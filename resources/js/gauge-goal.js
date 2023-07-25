/* Imports */
import * as am5 from "@amcharts/amcharts5";
import * as am5xy from "@amcharts/amcharts5/xy";
import * as am5radar from "@amcharts/amcharts5/radar";
import am5themes_Animated from "@amcharts/amcharts5/themes/Animated";

$.get("http://127.0.0.1:8000/api/sales-to-chart", function (porcentage, status) {

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    let root = am5.Root.new("gaugediv");

    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
        am5themes_Animated.new(root)
    ]);

    // Create chart
    // https://www.amcharts.com/docs/v5/charts/radar-chart/
    let chart = root.container.children.push(am5radar.RadarChart.new(root, {
        panX: false,
        panY: false,
        startAngle: 160,
        endAngle: 380
    }));


    // Create axis and its renderer
    // https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Axes
    let axisRenderer = am5radar.AxisRendererCircular.new(root, {
        innerRadius: -50
    });

    axisRenderer.grid.template.setAll({
        stroke: root.interfaceColors.get("background"),
        visible: true,
        strokeOpacity: 0.8
    });

    let xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
        maxDeviation: 0,
        min: 0,
        max: 100,
        strictMinMax: true,
        renderer: axisRenderer
    }));


    // Add clock hand
    // https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Clock_hands
    let axisDataItem = xAxis.makeDataItem({});

    let clockHand = am5radar.ClockHand.new(root, {
        pinRadius: am5.percent(20),
        radius: am5.percent(100),
        bottomWidth: 40
    })

    let bullet = axisDataItem.set("bullet", am5xy.AxisBullet.new(root, {
        sprite: clockHand
    }));

    xAxis.createAxisRange(axisDataItem);

    let label = chart.radarContainer.children.push(am5.Label.new(root, {
        fill: am5.color(0xffffff),
        centerX: am5.percent(50),
        textAlign: "center",
        centerY: am5.percent(50),
        fontSize: "2em"
    }));

    axisDataItem.set("value", 50);
    bullet.get("sprite").on("rotation", function () {
        let value = axisDataItem.get("value");
        let text = Math.round(axisDataItem.get("value")).toString();
        let fill = am5.color(0x000000);
        xAxis.axisRanges.each(function (axisRange) {
            if (value >= axisRange.get("value") && value <= axisRange.get("endValue")) {
                fill = axisRange.get("axisFill").get("fill");
            }
        })

        label.set("text", Math.round(value).toString() + '%');

        clockHand.pin.animate({ key: "fill", to: fill, duration: 500, easing: am5.ease.out(am5.ease.cubic) })
        clockHand.hand.animate({ key: "fill", to: fill, duration: 500, easing: am5.ease.out(am5.ease.cubic) })
    });

    axisDataItem.animate({
        key: "value",
        to: porcentage.value,
        duration: 500,
        easing: am5.ease.out(am5.ease.cubic)
    });

    chart.bulletsContainer.set("mask", undefined);


    // Create axis ranges bands
    // https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Bands
    var bandsData = [{
        title: "Muito baixo",
        color: "#ee1f25",
        lowScore: 0,
        highScore: 20
    }, {
        title: "Baixo",
        color: "#f04922",
        lowScore: 20,
        highScore: 40
    }, {
        title: "Médio",
        color: "#f3eb0c",
        lowScore: 40,
        highScore: 60
    }, {
        title: "Bom",
        color: "#54b947",
        lowScore: 60,
        highScore: 80
    }, {
        title: "Excelente",
        color: "#0f9747",
        lowScore: 80,
        highScore: 100
    }];

    am5.array.each(bandsData, function (data) {
        let axisRange = xAxis.createAxisRange(xAxis.makeDataItem({}));

        axisRange.setAll({
            value: data.lowScore,
            endValue: data.highScore
        });

        axisRange.get("axisFill").setAll({
            visible: true,
            fill: am5.color(data.color),
            fillOpacity: 0.8
        });

        axisRange.get("label").setAll({
            text: data.title,
            inside: true,
            radius: 15,
            fontSize: "1.3em",
            fill: '#545454'
        });
    });

    // Make stuff animate on load
    chart.appear(1000, 100);

});