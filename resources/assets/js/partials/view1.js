document.addEventListener("DOMContentLoaded", () => {

    // Filter for view 1 logic
    let filters = document.querySelectorAll('input[name=filterCenters]');

    filters.forEach(radio => {
        radio.addEventListener('change', (e) => {
            radio.closest('form').submit();
        })
    })

    // Apply to all "delete buttons" logic to open a modal and change the user name on the text
    let buttons = document.querySelectorAll('.btnTriggerModal');
    let modal = document.getElementById('modalDeleteUser');
    let deleteHint = document.getElementById('deleteYourself');

    buttons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            // Hide by default this alert message
            deleteHint.classList.add('d-none')

            // Set the user name that will be deleted
            let userId = document.querySelector('input[name=userId]');
            document.getElementById('userName-text').innerText = e.target.dataset.fullname;

            // Set the action attribute to the form with the correct user id
            let form = document.getElementById('formDeleteUser');
            form.setAttribute("action", e.target.dataset.formurl);

            // Check if the user that will be deleted is yourself
            if (userId.value === e.target.dataset.userid) {
                deleteHint.classList.remove('d-none')
            }

            // Open modal
            jQuery(modal).modal('show')
        })
    })

})
