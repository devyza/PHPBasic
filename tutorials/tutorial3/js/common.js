setMaxDate();

function setMaxDate() {

    // Set previous year date as max value
    maxDate = new Date();
    maxDate.setDate(31);
    maxDate.setMonth(11);
    maxDate.setFullYear(maxDate.getFullYear() - 1);


    // Set maxmium value to DOB Input
    txtDOB = document.getElementById("txtDOB");
    txtDOB.max = maxDate.toISOString().split("T")[0];
}