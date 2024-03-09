import React from "react";
import { Line } from "react-chartjs-2";
import Chart from "chart.js/auto";

export default function LineChartComponent({ isLightMode }) {
    const options = {
        scales: {
            x: {
                ticks: {
                    color: isLightMode ? "black" : "white",
                },
                grid: {
                    color: "rgba(255, 255, 255, 0.1)",
                },
            },
            y: {
                ticks: {
                    color: isLightMode ? "black" : "white",
                },
                grid: {
                    color: "rgba(255, 255, 255, 0.1)",
                },
            },
        },
        plugins: {
            legend: {
                labels: {
                    color: isLightMode ? "black" : "white",
                },
            },
        },
    };
    const chartData = {
        labels: ["January", "February", "March", "April", "May"],
        datasets: [
            {
                label: "Users Gained",
                data: [65, 59, 80, 81, 56],
                fill: false,
                backgroundColor: "#a5f3fc",
                borderColor: "#a5f3fc",
            },
        ],
    };
    return <Line data={chartData} options={options} />;
}
