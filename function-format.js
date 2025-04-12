
function parseFormattedNumber(numStr) {
    if (typeof numStr !== "string") {
        numStr = numStr.toString(); // Convertir en string si ce n'est pas déjà le cas
    }
    if (numStr.includes("M")) return parseFloat(numStr) * 1e6;
    if (numStr.includes("k")) return parseFloat(numStr) * 1e3;
    if (numStr.includes("B")) return parseFloat(numStr) * 1e9;
    return parseFloat(numStr);
}

function formatNumber(num) {
    if (num >= 1e9) return (num / 1e9).toFixed(2) + "B";
    if (num >= 1e6) return (num / 1e6).toFixed(2) + "M";
    if (num >= 1e3) return (num / 1e3).toFixed(2) + "k";
    return num.toFixed(2);
}