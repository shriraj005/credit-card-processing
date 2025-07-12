<?php
include 'db.php';

$card_types = ["Travel", "Business", "Cashback", "Rewards", "Student"];
$selected_type = isset($_GET['type']) ? $_GET['type'] : 'All';

$cards = [
    ["Chase Sapphire Preferred", "Travel"],
    ["Capital One Venture Rewards", "Travel"],
    ["American Express Platinum", "Travel"],
    ["Ink Business Preferred", "Business"],
    ["Citi Double Cash", "Cashback"],
    ["Discover It Cashback", "Cashback"],
    ["American Express Gold", "Rewards"],
    ["Chase Sapphire Reserve", "Rewards"],
    ["Discover It Student Cash Back", "Student"],
];

$filtered_cards = $selected_type === 'All' ? $cards : array_filter($cards, fn($c) => $c[1] === $selected_type);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Cards</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; text-align: center; }
        .container { width: 50%; margin: 50px auto; background: white; padding: 20px; border-radius: 10px; }
        select, ul { width: 100%; padding: 10px; border-radius: 5px; }
        ul { list-style-type: none; padding: 0; }
        li { padding: 8px; border-bottom: 1px solid #ccc; }
    </style>
</head>
<body>

<div class="container">
    <h2>Credit Cards</h2>
    <form method="get">
        <select name="type" onchange="this.form.submit()">
            <option value="All">All</option>
            <?php foreach ($card_types as $type) : ?>
                <option value="<?php echo $type; ?>" <?php if ($selected_type == $type) echo "selected"; ?>><?php echo $type; ?></option>
            <?php endforeach; ?>
        </select>
    </form>
    <ul>
        <?php foreach ($filtered_cards as $card) : ?>
            <li><?php echo $card[0] . " - " . $card[1]; ?></li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
