
    var constPersons = ["P", "N", "B", "A"];
    var varPersons = ["H", "M", "O", "G"];




    function removePerson(letters,user) {
        var index;
        for (var i = 0; i <= letters.length; i++) {
            if (letters[i] === user) {
                index = i;
            }
        }
        letters.splice(index, 1);
        return letters;
    }





