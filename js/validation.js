function validate(input) {
    
    let data = input.data()
    let value
    if(data.image){
        value = input[0].files
    }else{
        value = input.val().trim()
    }
   
   
    if (data.require) {
        if (value == "" || value.length < 1) {
            $(`#${data.display}`).text(data.error)
            return false
        } else {
            $(`#${data.display}`).text("")
        }
    }

    if (data.radio) {
        if (!checkRadio(input)) {
            $(`#${data.display}`).text(data.error)
            return false
        } else {
            $(`#${data.display}`).text("")
        }
    }

    if (data.email) {


        if (email(value)) {
            $(`#${data.display}`).text("")
        } else {
            $(`#${data.display}`).text(parseJSON(data.email).msg)
            return false
        }
    }

    if (data.onlychar) {
        if (charOnly(value)) {
            $(`#${data.display}`).text("")
        } else {
            $(`#${data.display}`).text(parseJSON(data.onlychar).msg)
            return false
        }
    }

    if (data.charwithspace) {

        if (charWithSpace(value)) {
            $(`#${data.display}`).text("")
        } else {
            $(`#${data.display}`).text(parseJSON(data.charwithspace).msg)
            return false
        }
    }

    if (data.number) {
        if (numberOnly(value)) {
            $(`#${data.display}`).text("")
        } else {
            $(`#${data.display}`).text(parseJSON(data.number).msg)
            return false
        }
    }

    if (data.long) {
        let numdata = parseJSON(data.long)
        if (value.length == numdata.len) {
            $(`#${data.display}`).text("")
        } else {
            $(`#${data.display}`).text(numdata.msg)
            return false
        }
    }

    if (data.min) {
        let numdata = parseJSON(data.min)
        if (value.length >= numdata.len) {
            $(`#${data.display}`).text("")
        } else {
            $(`#${data.display}`).text(numdata.msg)
            return false
        }
    }

    if (data.max) {
        let numdata = parseJSON(data.max)
        if (value.length <= numdata.len) {
            $(`#${data.display}`).text("")
        } else {
            $(`#${data.display}`).text(numdata.msg)
            return false
        }
    }

    if (data.match) {
        let tomatch = $(`#${parseJSON(data.match).to}`).val()

        if (value == tomatch) {
            $(`#${data.display}`).text("")
        } else {
            $(`#${data.display}`).text(parseJSON(data.match).msg)
            return false
        }
    }

    if(data.image){
        let isImage = false
        let allow = data.allow.split(",")
        for(let i=0;i<value.length;i++){
            let ext = value[i].type.split('/')[1].toLowerCase().trim()
            if(allow.indexOf(ext) > -1){
                isImage= true
            }else{
                $(`#${data.display}`).text("Choose valid image")
                isImage= false
            }
        }
        
       return isImage
       

       

        
    }



    return true
}





function parseJSON(hash) {
    return JSON.parse(JSON.stringify(hash))
}

function email(email) {
    const reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (reg.test(email.toLowerCase())) {
        return true
    } else {
        return false
    }
}
function charOnly(hash) {
    let reg = /^[a-zA-Z]+$/

    if (reg.test(hash)) {
        return true
    } else {
        return false
    }
}

function charWithSpace(hash) {
    let reg = /^[a-zA-Z ]+$/

    if (reg.test(hash)) {
        return true
    } else {
        return false
    }
}

function numberOnly(hash) {
    let reg = /^[0-9]+$/

    if (reg.test(hash)) {
        return true
    } else {
        return false
    }
}

function checkRadio(input) {
    let isvalid = false
    for (var i = 0; i < input.length; i++) {
        if (input[i].checked == true) {
            return true
        } else {
            isvalid = false
        }
    }
    return isvalid
}