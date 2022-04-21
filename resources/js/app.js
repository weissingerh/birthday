require("./bootstrap");
global.$ = global.jQuery = require("jquery");

import { fabric } from "fabric";

if(document.getElementById('canvas-container')){
var canvasContainer = document.getElementById("canvas-container");
var containerWidth = canvasContainer.offsetWidth;
var containerHeight = canvasContainer.offsetHeight;

    var canvas = new fabric.Canvas("canvas", {
        isDrawingMode: true,
        width: containerWidth,
        height: containerHeight,
    });
    canvas.freeDrawingBrush.width = 10;
    canvas.freeDrawingBrush.color = "#13ce66";
    
}
var clearBtn = document.getElementById("clear-canvas");
if (clearBtn) {
    clearBtn.onclick = function () {
        canvas.clear();
    };
}
$("#submit-drawing").on("click", function (e) {
    canvas.backgroundImage = null;

    var svg = canvas.toSVG();
    var doc = new DOMParser();
    var parsed = doc.parseFromString(svg, "application/xml");

    var svgElement = parsed.documentElement;
    document.getElementsByTagName("body")[0].append(svgElement);

    var bbox = svgElement.getBBox();
    var viewBox = [bbox.x, bbox.y, bbox.width, bbox.height].join(" ");

    svgElement.setAttribute("viewBox", viewBox);

    $("input[name=drawing]").val(svgElement.outerHTML);
});

import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();
