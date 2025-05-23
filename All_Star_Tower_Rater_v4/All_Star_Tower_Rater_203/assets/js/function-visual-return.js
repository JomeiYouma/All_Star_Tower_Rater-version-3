//========================== Petite automatisation d'un retour visuel ==========================
function visualReturn(element, text, backColor, textColor, initialText) {
  element.innerHTML = text;
  element.style.backgroundColor = backColor;
  element.style.color = textColor;

  // Après 2 secondes, revenir à "LOAD"
  setTimeout(() => {
    element.innerHTML = initialText || "";
    element.style.backgroundColor = ""; // remet la couleur d'origine
    element.style.color = ""; // remet le texte normal si modifié
  }, 2000);
}
