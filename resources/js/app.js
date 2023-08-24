import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])


// RECUPERO TUTTI I DELETE_BUTTON DI OGNI PROGETTO
const projectDeleteButton = document.querySelectorAll('.project-delete-button');

// CICLO TUTTI I PULSANTI
projectDeleteButton.forEach((button) => {

    button.addEventListener('click', (event) => {

        event.preventDefault();

        // QUANDO L'UTENTE CLICCA SUL DELETE_BUTTON, MI VIENE PASSATO UN DATA ATTRIBUTE, LO RECUPERO TRAMITE QUESTA STRINGA
        const projectTitle = button.getAttribute('data-project-title');

        const modalProjectTitle = document.getElementById('modal-project-title');

        // IN QUESTO MODO RECUPERO IL TITOLO DEL PROGETTO
        modalProjectTitle.innerText = projectTitle;

        // RECUPERO L'HTML DELLA MODALE TREMITE L'ID
        const modal = document.getElementById('projectConfirmDeleteModal');  //FARE ATTENZIONE AL NOME COMPLETO DELL'ID

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        // RECUPERO IL PULSANTE DI "CONFERMA CANCELLAZIONE" PRESENTE NELLA MODALE
        const projectConfirmDeleteButton = document.getElementById('project-confirm-delete-button');

        // AL PULSANTE DI "CONFERMA CANCELLAZIONE", AGGIUNGO UN EVENT_LISTENER "CLICK"
        projectConfirmDeleteButton.addEventListener('click', () => {

            // RECUPERO IL "DELETE_BUTTON", ED ESEGUO LA FORM DI CANCELLAZIONE
            button.submit();
        })
    })
})