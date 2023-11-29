function getRandomColor() {
    var letters = "0123456789ABCDEF";
    var color = "#";
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

var labels = [];
var dataEffectif = [];
var colors = [];

for (var i = 0; i < effectif.length; i++) {
    labels.push(effectif[i][0]);
    dataEffectif.push(effectif[i][1]);
    colors.push(getRandomColor());
}

const ctx = document.getElementById("donut").getContext("2d");

const data = {
    labels: labels,
    datasets: [
        {
            data: dataEffectif,
            backgroundColor: colors,
        },
    ],
};

const donut = new Chart(ctx, {
    type: "doughnut",
    data: data,
    options: {
        maintainAspectRatio: false,
        responsive: true,
        aspectRatio: 1, // Ajuste le ratio hauteur/largeur (1 = carré)
    },
});
//genre
var labelsGenre = [];
var dataGenre = [];
var colors = [];

for (var i = 0; i < nbGenre.length; i++) {
    labelsGenre.push(nbGenre[i][0]);
    dataGenre.push(nbGenre[i][1]);
    colors.push(getRandomColor());
}

const ctx1 = document.getElementById("pie").getContext("2d");

const data1 = {
    labels: labelsGenre,
    datasets: [
        {
            data: dataGenre,
            backgroundColor: colors,
        },
    ],
};

const pie = new Chart(ctx1, {
    type: "pie",
    data: data1,
    options: {
        maintainAspectRatio: false,
        responsive: true,
        aspectRatio: 1, // Ajuste le ratio hauteur/largeur (1 = carré)
    },
});

//contrat
var labelsContrat = [];
var dataContrat = [];
var colors = [];

for (var i = 0; i < effectifContrat.length; i++) {
    labelsContrat.push(effectifContrat[i][0]);
    dataContrat.push(effectifContrat[i][1]);
    colors.push(getRandomColor());
}

const ctx2 = document.getElementById("bar").getContext("2d");

const data2 = {
    labels: labelsContrat,
    datasets: [
        {
            data: dataContrat,
            backgroundColor: colors,
        },
    ],
};

const bar = new Chart(ctx2, {
    type: "bar",
    data: data2,
    options: {
        maintainAspectRatio: false,
        responsive: true,
        aspectRatio: 1, // Ajuste le ratio hauteur/largeur (1 = carré)
    },
    plugins: {
        legend: {
            display: false,
        },
    },


});

//depense salariale dept
var labelSalaireDept = [];
var dataSalaireDept = [];
var colors = [];

for (var i = 0; i < depenseSalaireDept.length; i++) {
    labelSalaireDept.push(depenseSalaireDept[i][0]);
    dataSalaireDept.push(depenseSalaireDept[i][1]);
    colors.push(getRandomColor());
}

colors = colors.filter(function(color) {
    return color !== undefined;
});

const ctx3 = document.getElementById("barSalaire").getContext("2d");

const data3 = {
    labels: labelSalaireDept,
    datasets: [
        {
            data: dataSalaireDept,
            backgroundColor: colors,
        },
    ],
};

const bar2 = new Chart(ctx3, {
    type: "bar",
    data: data3,
    options: {
        maintainAspectRatio: false,
        responsive: true,
        aspectRatio: 1, // Ajuste le ratio hauteur/largeur (1 = carré)
    },
    plugins: {
        legend: {
            display: false,
        },
    },
});