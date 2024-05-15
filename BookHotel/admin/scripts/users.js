
function get_users()
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/users.php",true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('users-data').innerHTML = this.responseText;
    }

    xhr.send('get_users');
}

function submit_edit_room()
{
    let data = new FormData();
    data.append('edit_room','');
    data.append('room_id',edit_room_form.elements['room_id'].value);
    data.append('name',edit_room_form.elements['name'].value);
    data.append('area',edit_room_form.elements['area'].value);
    data.append('price',edit_room_form.elements['price'].value);
    data.append('quantity',edit_room_form.elements['quantity'].value);
    data.append('adult',edit_room_form.elements['adult'].value);
    data.append('children',edit_room_form.elements['children'].value);
    data.append('desc',edit_room_form.elements['desc'].value);

    let features = [];
    edit_room_form.elements['features'].forEach(el =>{
        if(el.checked){
            features.push(el.value);
        }
    });

    let facilities = [];
    edit_room_form.elements['facilities'].forEach(el =>{
        if(el.checked){
            facilities.push(el.value);
        }
    });

    data.append('features',JSON.stringify(features));
    data.append('facilities',JSON.stringify(facilities));
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/rooms.php",true);

    xhr.onload = function(){
        var myModal = document.getElementById('edit-room');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if(this.responseText==1){
            alert('success','Room data edited!');
            edit_room_form.reset();
            get_all_rooms();
        }
        else{
            alert('error','Server Down!');
        }
    }


    xhr.send(data);
}

function toggle_status(id,val)
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/users.php",true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        if(this.responseText==1){
            alert('success','Status toggled!');
            get_users();
        }
        else{
            alert('error','Server down!');
        }
    }

    xhr.send('toggle_status='+id+'&value='+val);
}

function remove_user(user_id)
{
    if(confirm("Are you sure, you want to remove this user?"))
    {
        let data = new FormData();
        data.append('user_id',user_id);
        data.append('remove_user','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","ajax/users.php",true);

        xhr.onload = function()
        {
            if(this.responseText == 1){
                alert('success','User Removed!');
                get_users();
            }
            else{  
                alert('error','User removal failed!');
            }
        }

        xhr.send(data);
    }
        
}

function search_user(username)
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/users.php",true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        document.getElementById('users-data').innerHTML = this.responseText;
    }

    xhr.send('search_user&name='+username);
}

    window.onload = function(){
        get_users();
    }