<?php

class Animal
{
    private $animals;

    public function __construct($data)
    {
        $this->animals = $data;
    }

    public function index()
    {
        foreach ($this->animals as $index => $animal) {
            echo "$index: $animal <br>";
        }
    }

    public function store($data)
    {
        array_push($this->animals, $data);
    }

    public function update($index, $data)
    {
        if (isset($this->animals[$index])) {
            $this->animals[$index] = $data;
        } else {
            echo "Index $index tidak valid.";
        }
    }

    public function destroy($index)
    {
        if (isset($this->animals[$index])) {
            unset($this->animals[$index]);
            $this->animals = array_values($this->animals); // Reindex array
        } else {
            echo "Index $index tidak valid.";
        }
    }
}

$animalsData = ['Kucing', 'Anjing', 'Burung'];
$animal = new Animal($animalsData);

echo "Index - Menampilkan seluruh hewan: <br>";
$animal->index();
echo "<br>";

echo "Store - Menambahkan hewan baru: <br>";
$animal->store('Ikan');
$animal->index();
echo "<br>";

echo "Update - Mengupdate hewan: <br>";
$animal->update(0, 'Kucing Anggora');
$animal->index();
echo "<br>";

echo "Destroy - Menghapus hewan: <br>";
$animal->destroy(1);
$animal->index();
echo "<br>";
?>