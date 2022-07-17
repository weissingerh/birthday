require("./bootstrap");
global.$ = global.jQuery = require("jquery");

import { fabric } from "fabric";

import { Splide } from "@splidejs/splide";
import { AutoScroll } from "@splidejs/splide-extension-auto-scroll";
import "@splidejs/splide/css";
require("./flapper.js");
document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("splide")) {
        new Splide("#splide", {
            type: "loop",
            loop: true,
            perPage: 3,
            speed: "600",
            padding: "1rem",
        }).mount({ AutoScroll });
    }
});

if (document.getElementById("canvas-container")) {
    var canvasContainer = document.getElementById("canvas-container");
    var containerWidth = canvasContainer.offsetWidth;
    var containerHeight = canvasContainer.offsetHeight;

    var canvas = new fabric.Canvas("canvas", {
        isDrawingMode: true,
        width: containerWidth,
        height: containerHeight,
    });
    canvas.freeDrawingBrush.width = 10;
    canvas.freeDrawingBrush.color = "#ffffff";
}
var clearBtn = document.getElementById("clear-canvas");
var undoBtn = document.getElementById("undo-canvas");

if (clearBtn || undoBtn) {
    clearBtn.onclick = function () {
        canvas.clear();
    };
    undoBtn.onclick = function () {
        var lastItemIndex = canvas.getObjects().length - 1;
        var item = canvas.item(lastItemIndex);

        if (item.get("type") === "path") {
            canvas.remove(item);
            canvas.renderAll();
        }
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
    var viewBox = [
        bbox.x - 20,
        bbox.y - 10,
        bbox.width + 30,
        bbox.height + 20,
    ].join(" ");

    svgElement.setAttribute("viewBox", viewBox);

    $("input[name=drawing]").val(svgElement.outerHTML);
});
if ($(".flapper")) {
    var flappers = global.$(".flapper");

    var options = {
        align: "left",
        width: 10, // number of digits
    };

    flappers.each(function (flapper) {
        $(this).flapper(options).val(this.id).change();
    });
}

import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();
