<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaires Côte à Côte</title>
    <style>
        .form-container {
            display: flex;
            justify-content: space-between;
        }

        .form-box {
            width: 45%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .form-box h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-box label {
            display: block;
            margin-bottom: 10px;
        }

        .form-box input[type="text"],
        .form-box select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .form-box button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-box">
            <h2>Formulaire 1</h2>
            <form>
                <label for="field1">Champ 1 :</label>
                <input type="text" id="field1" name="field1">

                <label for="field2">Champ 2 :</label>
                <input type="text" id="field2" name="field2">

                <label for="field3">Champ 3 :</label>
                <select id="field3" name="field3">
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                </select>

                <button type="submit">Soumettre</button>
            </form>
        </div>

        <div class="form-box">
            <h2>Formulaire 2</h2>
            <form>
                <label for="field4">Champ 4 :</label>
                <input type="text" id="field4" name="field4">

                <label for="field5">Champ 5 :</label>
                <input type="text" id="field5" name="field5">

                <label for="field6">Champ 6 :</label>
                <select id="field6" name="field6">
                    <option value="option4">Option 4</option>
                    <option value="option5">Option 5</option>
                    <option value="option6">Option 6</option>
                </select>

                <button type="submit">Soumettre</button>
            </form>
        </div>
    </div>
</body>
</html>
