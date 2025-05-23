//========================== FONCTION POUR DONNER UNE BELLE APPARENCE AUX CHIFFRES ==========================
/* function parseFormattedNumber(numStr) {
    if (typeof numStr !== "string") {
        numStr = numStr.toString();
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

function parseFormattedNumber2(numStr) {
    if (typeof numStr !== "string") {
        numStr = numStr.toString();
    }
    numStr = numStr.replace(/[+,]/g, '').trim(); 
    if (numStr.includes("M")) return parseFloat(numStr) * 1e6;
    if (numStr.includes("k")) return parseFloat(numStr) * 1e3;
    if (numStr.includes("B")) return parseFloat(numStr) * 1e9;
    return parseFloat(numStr);
}

function formatNumberShort(num) {
    if (num >= 1e9) return (num / 1e9).toFixed(1) + "B";
    if (num >= 1e6) return (num / 1e6).toFixed(1) + "M";
    if (num >= 1e3) return (num / 1e3).toFixed(1) + "k";
    return num.toString();
} */
// ## Fonction transformée par ChatGPT pour fonctionner avec les nombres négatifs (avec la première version en entrée)
function parseFormattedNumber(numStr) {
  if (typeof numStr !== "string") {
    numStr = numStr.toString();
  }
  numStr = numStr.replace(/[+,]/g, "").trim();
  const isNegative = numStr.startsWith("-");
  numStr = numStr.replace("-", "");

  let value;
  if (numStr.includes("B")) value = parseFloat(numStr) * 1e9;
  else if (numStr.includes("M")) value = parseFloat(numStr) * 1e6;
  else if (numStr.includes("k")) value = parseFloat(numStr) * 1e3;
  else value = parseFloat(numStr);

  return isNegative ? -value : value;
}

function formatNumberShort(num) {
  const abs = Math.abs(num);
  const sign = num < 0 ? "-" : "";
  if (abs >= 1e9) return sign + (abs / 1e9).toFixed(2) + "B";
  if (abs >= 1e6) return sign + (abs / 1e6).toFixed(2) + "M";
  if (abs >= 1e3) return sign + (abs / 1e3).toFixed(2) + "k";
  return sign + abs.toFixed(3);
}

console.log("function-format working");
