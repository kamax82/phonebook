        var fieldId = 0;
		function addElement(parentId, elementTag, elementId, html) {
        var p = document.getElementById('addTel');
        var newElement = document.createElement('p');
        newElement.setAttribute('id', fieldId);
        newElement.innerHTML = html;
        p.appendChild(newElement);
    };

    	function addTel() {
        fieldId++; 
        var html = '<div class="">'+
                '<label for="input" class="col-sm-2 control-label">Телефон:</label>'+
				'<input type="tel" name="tel[]" id="tel" value="" required="required" title="">'+
				'<input type="button" value="убрать" onclick="removeElement(fieldId);" />';
        addElement('addTel', 'p', fieldId, html);
    };

 
    function removeElement(elementId) {
        // Removes an element from the document
        var element = document.getElementById(fieldId);
        element.parentNode.removeChild(element);
        fieldId--;
    };

    // function delTel() {
    //     if (confirm("Удалить номер?")){
    //         $.post("del_tel.php", {id:145}).done(function(){
    //             alert("Удалено");
    //         }).fail(function(){
    //             alert("Ошибка");
    //         })
    //     }
    // };


    


