getTableData();

function getTableData() {
    var members = getMembers();
    if(members.length == 0) {
        document.querySelector('.show-table-info').classList.remove('hide');
    }
    else {
        members.forEach(function (item, index) {
            insertIntoTableView(item, index + 1);
        });
    }
}

function getMembers() {
    var memberRecord = localStorage.getItem("members");
    var members = [];
    if (!memberRecord) {
        return members;
    } else {
        members = JSON.parse(memberRecord);
        return members;
    }
}

function insertIntoTableView(item, tableIndex) {
    var table = document.getElementById('member_table');
    var row = table.insertRow();
    var idCell = row.insertCell(0); // id
    var titleCell = row.insertCell(1); // title
    var descriptionCell = row.insertCell(2); // description
    var authorNameCell = row.insertCell(3); // name
    var authorEmailCell = row.insertCell(4); // email
    var actionCell = row.insertCell(5);
    
    var guid = item.id;
    idCell.innerHTML = tableIndex;
    titleCell.innerHTML = item.title;
    descriptionCell.innerHTML = item.description;
    authorNameCell.innerHTML = item.author_name;
    authorEmailCell.innerHTML = item.email;
    actionCell.innerHTML = `<button class="btn btn-sm btn-primary" onclick="showEditModal(${guid})"><i class="fa fa-pencil" aria-hidden="true"></i></button>` + `&nbsp;<button class="btn btn-sm btn-danger" onclick="showDeleteModal(${guid})"><i class="fa fa-trash" aria-hidden="true"></i></button>`;
}


// Unique ID for each record
function guid() {
    return parseInt(Date.now() + Math.random());
}

// Create and Store New Member
function saveMemberInfo() {
    var keys = ['title', 'description', 'author_name', 'email']; // input ids
    var obj = {};

    keys.forEach(function (item) {
        var result = document.getElementById(item).value;
        if (result) {
            obj[item] = result;
        }
    });

    var members = getMembers();

    if (Object.keys(obj).length) {
        obj.id = guid();
        members.push(obj);
        var data = JSON.stringify(members);
        localStorage.setItem("members", data);
        // insertIntoTableView(obj, getTotalRowOfTable());
        window.location.reload();
        // document.querySelector('.show-table-info').classList.toggle('hide');
    }
}

function getTotalRowOfTable() {
    var table = document.getElementById('member_table');
    return table.rows.length;
}

// Show Edit Modal of a single member
function showEditModal(id) {
    var allMembers = getMembers();
    var member = allMembers.find(function (item) {
        return item.id == id;
    });
    $('#edit_title').val(member.title);
    $('#edit_description').val(member.description);
    $('#edit_author_name').val(member.author_name);
    $('#edit_email').val(member.email);
    $('#member_id').val(id);

    $('#editModal').modal();
}

// Store Updated Member Data into the storage
function updateMemberData() {
    var allMembers = getMembers();
    var memberId = $('#member_id').val();

    var member = allMembers.find(function (item) {
        return item.id == memberId;
    })

    member.title = $('#edit_title').val();
    member.description = $('#edit_description').val();
    member.author_name = $('#edit_author_name').val();
    member.email = $('#edit_email').val();

    var data = JSON.stringify(allMembers);
    localStorage.setItem('members', data);
    $('#editModal').modal('hide')
    window.location.reload();
}


function showDeleteModal(id) {
    $('#deleted-member-id').val(id);
    $('#deleteDialog').modal();
}


function deleteMemberData() {
    var id = $('#deleted-member-id').val();

    var storageUsers = JSON.parse(localStorage.getItem('members'));

    var newData = [];

    newData = storageUsers.filter(function (item, index) {
        return item.id != id;
    });

    var data = JSON.stringify(newData);

    localStorage.setItem('members', data);
    $('#deleteDialog').modal('hide');
    window.location.reload();
}
