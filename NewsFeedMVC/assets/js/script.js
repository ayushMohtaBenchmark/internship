function validateForm() {
    let title = document.forms['myform']['title'].value;
    if (title == "") {
        alert("Title cannot be empty");
        return false;
    }

    let email = document.forms['myform']['email'].value;
    if (email != "") {
        // if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {

        // } else {
        //     alert("Please enter a valid Email-ID");
        //     return false;
        // }
    } else {
        alert("Email cannot be empty");
        return false;
    }

    let description = document.forms['myform']['description'].value;
    if (description == "") {
        alert("Description cannot be empty");
        return false;
    }

    let name = document.forms['myform']['name'].value;
    if (name == "") {
        alert("Name cannot be empty");
        return false;
    }

}

function validateEditForm() {
    let title = document.forms['editForm']['edit_title'].value;
    if (title == "") {
        alert("Title cannot be empty");
        return false;
    }

    let email = document.forms['editForm']['edit_email'].value;
    if (email != "") {
        // if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {

        // } else {
        //     alert("Please enter a valid Email-ID");
        //     return false;
        // }
    } else {
        alert("Email cannot be empty");
        return false;
    }

    let description = document.forms['editForm']['edit_description'].value;
    if (description == "") {
        alert("Description cannot be empty");
        return false;
    }

    let author_name = document.forms['editForm']['edit_author_name'].value;
    if (author_name == "") {
        alert("Place cannot be empty");
        return false;
    }

}