/* globals Chart:false */

/* (() => {
    "use strict";

    // Graphs
    const ctx = document.getElementById("myChart");
    // eslint-disable-next-line no-unused-vars
    const myChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: [
                "Sunday",
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday",
            ],
            datasets: [
                {
                    data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                    lineTension: 0,
                    backgroundColor: "transparent",
                    borderColor: "#007bff",
                    borderWidth: 4,
                    pointBackgroundColor: "#007bff",
                },
            ],
        },
        options: {
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    boxPadding: 3,
                },
            },
        },
    });
})(); */

let chart;

function getData() {
    // $.ajaxSetup({
    //     headers: {
    //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    //     },
    // });

    // var csrftoken = $('meta[name="csrf-token"]').attr("content");

    $.ajax({
        url: "/api/chart",
        method: "GET",
        dataType: "json",
        data: {
            pays: $("#pays").val(),
            from: $("#from").val(),
            to: $("#to").val(),
        },
        beforSend: function (xhr, settings) {
            xhr.setRequestHeader(
                "X-CSRF-Token",
                $('meta[name="csrf-token"]').attr("content")
            );
        },
        success: function (data) {
            const pays = data.pays;
            const carteData = data.carteData;

            const ctx = document.getElementById("myChart").getContext("2d");

            if (chart) {
                chart.destroy();
            }

            chart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: ["Vu", "Valider", "Total"],
                    datasets: [
                        {
                            label: `Carte pour le pays ${pays}`,
                            data: [
                                carteData.Vu,
                                carteData.Valider,
                                carteData.Total,
                            ],
                        },
                    ],
                    backgroundColor: ["#007bff", "#28a745", "#dc3545"],
                    borderwidth: 1,
                },
                options: {
                    respomsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });
        },
        Error: function (error) {
            console.log(error);
        },
    });

    // const ctx = document.getElementById("myChart");

    // new Chart(ctx, {
    //     type: "bar",
    //     data: {
    //         labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
    //         datasets: [
    //             {
    //                 label: "# of Votes",
    //                 data: [12, 19, 3, 5, 2, 3],
    //                 borderWidth: 1,
    //             },
    //         ],
    //     },
    //     options: {
    //         scales: {
    //             y: {
    //                 beginAtZero: true,
    //             },
    //         },
    //     },
    // });
}
