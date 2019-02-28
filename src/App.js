import React, { Component } from "react";
import logo from "./logo.svg";
import * as d3 from "d3";
import "./App.css";
import Chart from "./components/Chart";

class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
      data: ""
    };
  }

  handleChange = e => {
    var file = e.target.files; // FileList object
    var reader = new FileReader();
    var lines;
    reader.onload = e => {
      lines = e.target.result.split("\r\n");

      let data = d3.csvParse(e.target.result);
      console.log(data);
      this.setState({ data: data });
    };
    console.log(lines);

    reader.readAsText(e.target.files.item(0));
  };

  render() {
    const { data } = this.state;
    return (
      <div className="App">
        <div className="csv">
          <label for="file-upload" class="custom-file-upload">
            <i class="fa fa-cloud-upload" /> File Upload
          </label>
          <div className="file">
            <input
              type="file"
              id="file-upload"
              onChange={this.handleChange.bind(this)}
              accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
            />
          </div>
        </div>
        <div className="chart">
          <Chart data={data} />
        </div>
      </div>
    );
  }
}

export default App;
