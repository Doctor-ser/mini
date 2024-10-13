<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/d22e378a1e.js" crossorigin="anonymous"></script>
    <title>Bus Booking Page</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <main>
        <div class="full">
        <section class="search">
            <div class="container">
                <h1>Find Your Bus</h1>
                <form method="post" action="bus_details.php">
                    <div class="form-group">
                    
                    <style>
                        #from, #to {
                            width: 300px; /* Adjust width */
                            height: 40px; /* Adjust height */
                        }
                    </style>

                    <form>
                        <label for="from">From:</label>
                        <select id="from" name="from" onchange="updateToOptions()">
                            <option value="">Select Starting Point</option>
                            <option value="Thiruvalla">Thiruvalla</option>
                            <option value="Kuttapuzha">Kuttapuzha</option>
                            <option value="Valanjavattom">Valanjavattom</option>
                            <option value="Nedumpuram">Nedumpuram</option>
                            <option value="Koipuram">Koipuram</option>
                            <option value="Kallooppara">Kallooppara</option>
                            <option value="Mallappally">Mallappally</option>
                        </select>

                        <br><br>

                        <label for="to">To:</label>
                        <select id="to" name="to">
                            <option value="">Select Ending Point</option>
                            <option value="Thiruvalla">Thiruvalla</option>
                            <option value="Kuttapuzha">Kuttapuzha</option>
                            <option value="Valanjavattom">Valanjavattom</option>
                            <option value="Nedumpuram">Nedumpuram</option>
                            <option value="Koipuram">Koipuram</option>
                            <option value="Kallooppara">Kallooppara</option>
                            <option value="Mallappally">Mallappally</option>
                        </select>
                        
                        <br><br>
                    </form>

                    <div class="form-group">
                        <label for="date">Date</label>
                       <input type="date" id="date" name="date">
                    </div>
                    <button type="submit">Search</button>
                </form>
            </div>
        </section>
    </div>
    </main>

    <script>
        function updateToOptions() {
            var fromSelect = document.getElementById("from");
            var toSelect = document.getElementById("to");

            // Get the selected "from" option
            var selectedFrom = fromSelect.value;

            // Reset "to" dropdown options
            var options = ['Thiruvalla', 'Kuttapuzha', 'Valanjavattom', 'Nedumpuram', 'Koipuram', 'Kallooppara', 'Mallappally'];
            toSelect.innerHTML = ''; // Clear current options

            // Add back options excluding the selected "from" option
            options.forEach(function(option) {
                if (option !== selectedFrom) {
                    var newOption = document.createElement("option");
                    newOption.value = option;
                    newOption.text = option;
                    toSelect.add(newOption);
                }
            });
        }
    </script>
</body>
</html>
