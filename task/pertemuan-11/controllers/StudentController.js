// TODO 3: Import data students dari folder data/students.js
// code here
const { request, response } = require("express");
const students = require("../data/students");

// Membuat Class StudentController
class StudentController {
  index(req, res) {
    // TODO 4: Tampilkan data students
    // code here

    const data = {
      message: "Data students",
      data: students,
    };

    res.send(data);
  }

  store(req, res) {
    // TODO 5: Tambahkan data students
    // code here
    const { name } = req.body;

    students.push(name);

    const data = {
      message: "Data created",
      data: students,
    };

    res.send(data);
  }

  update(req, res) {
    // TODO 6: Update data students
    // code here
    const { name } = req.body;

    students[req.params.id] = name;

    const data = {
      message: "Data updated",
      data: students,
    };

    res.send(data);
  }

  destroy(req, res) {
    // TODO 7: Hapus data students
    // code here
    students.splice(req.params.id, 1);

    const data = {
      message: "Data deleted",
      data: students,
    };

    res.send(data);
  }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;
