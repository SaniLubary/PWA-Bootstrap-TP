// Variable que se actualiza segun imagen seleccionada
//  para hacer dinamicas la tabla y parrafo
let activeListItemId = ''

// Agregamos un event listener a dotas las tarjetas, para actualizar la imagen central de la pagina acorde a la card clickeada
const cards = document.getElementsByClassName('clickableUpdateMainPicture');
for (let i = 0; i < cards.length; i++) {
  cards[i].addEventListener('click', updateMainPicture);
}

/**
 * Actualiza la imagen central
 * Detecta si a la funcion se llego haciendo click en un Card, o en un List Item
 *  acorde a de donde se hizo click, se actualiza la class 'active' para el elemento
 *  list-item correspondiente
 * @param {*} cardSrc 
 * @returns 
 */
function updateMainPicture(cardSrc = '') {
  let src = ''
  let relatedListItem = ''

  // Detecta de donde se hizo click (la card o la list-item)
  if (typeof (cardSrc) === 'string' && cardSrc !== '') {
    src = cardSrc
  } else if (this.src) {
    // si se hizo click en la card, buscamos el atributo 'data-item' que contiene el id del list-item al que tendremos que agregar la clase 'active'
    if (this.attributes['data-item']) {
      relatedListItem = this.attributes['data-item'].value;
    }
    src = this.src
  }

  // si src es invalido se cancela la operacion
  if (typeof (src) !== 'string' || src === '') return false

  // se actualiza la imagen central
  const mainPicture = document.getElementById('main-picture')
  mainPicture.src = src

  // si existe relatedListItem (porque se hizo click en una card) se actualiza la clase 'active' al list-item relacionado
  if (relatedListItem !== '') {
    setListItemActive(document.getElementById(relatedListItem))
  }

  return true
}

/**
 * Funcion ejecutada cuando un 'list-item' es clickeado
 * Actualiza la imagen central de acuerdo al id de la card pasada por parametro
 * @param {*} e 
 * @param {*} cardId id de la card cuya imagen queremos ampliar a la imagen central
 * @returns 
 */
function listItemClicked(e, cardId) {
  const card = document.getElementById(cardId)
  if (!card.src) return

  if (updateMainPicture(card.src)) {
    setListItemActive(e)
  }
}

/**
 * Recibe el elemento 'list-item' al que se quiere agregar la clase 'active'
 * Quita la clase 'active' del resto de elementos en caso de que haya otro active
 * @param {*} element 
 */
function setListItemActive(element) {
  const prevActiveItem = document.getElementsByClassName('list-group-item')
  for (let i = 0; i < prevActiveItem.length; i++) {
    if (prevActiveItem[i].classList.contains('active')) {
      prevActiveItem[i].classList.remove('active')
    }
  }

  activeListItemId = element.id
  console.log(activeListItemId);
  element.className += ' active'
}
