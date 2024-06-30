<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    Vote Results
  </title>
    <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="css/votestyle.css" />
</head>

<body>
    <?php
    include "includes/nav.php";
    ?>
  <?php
  include 'includes/dbConn.php';
  ?>
  <?php
  $sqlTotalResultsQuery = "SELECT * FROM results, contestant_details WHERE eventID ='{$_GET['eventID']}' AND contestant_details.cNIC=results.cNIC;";
  $result = mysqli_query($conn, $sqlTotalResultsQuery);

  $sqlAllClosedEventsQuery = "SELECT * FROM event_details WHERE eventStatus = 'closed';";
  $eventList = mysqli_query($conn, $sqlAllClosedEventsQuery);

  ?>

  <div class="container">
    <h1>Vote Results</h1>
    <br />
    <h3>select an event</h3>
      <select name="events" id="events" onchange="location = this.value;">
          <option value="" selected disabled>Select event</option>
          <?php
          if ($eventList) {
              while ($row = mysqli_fetch_assoc($eventList)) {
                  echo '<option value="vote.php?eventID=' . $row['eventID'] . '"';
                  if (isset($_GET['eventID']) && $row['eventID'] == $_GET['eventID']) {
                      echo 'selected="selected"';
                  }
                  echo '>' . $row['eDescription'] . '</option>';
              }
          }
          ?>
      </select>
    <div id="vote-results"></div>
    <table id="vote-results-table">
      <thead>
        <tr>
          <th>Contestant</th>
          <th>Votes</th>
        </tr>
      </thead>
      <tbody id="vote-results-table-body">
        <!-- Vote result rows will be dynamically added here -->
      </tbody>
    </table>
  </div>
  <footer>
    <p>&copy; 2023 Your Website. All rights reserved.</p>
  </footer>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Simulated vote data (replace with your actual data)
      var voteData = [
        <?php
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo ' { contestant: "' . $row['cNIC'] . '-' . $row['fName'] . '", votes: ' . $row['totVotes'] . ' },';
          }
        }
        ?>
      ];

      // Generate the vote result table
      var tableBody = document.querySelector("#vote-results-table tbody");
      voteData.forEach(function(vote) {
        var row = document.createElement("tr");
        row.innerHTML = `
      <td>${vote.contestant}</td>
      <td>${vote.votes}</td>
      <td>
      </td>
    `;
        tableBody.appendChild(row);
      });

      // Generate the vote result bar chart
      var chartData = voteData.map(function(vote) {
        return {
          x: vote.contestant,
          y: vote.votes
        };
      });

      var options = {
        chart: {
          type: 'bar',
          height: 350
        },
        series: [{
          data: chartData
        }],
        xaxis: {
          type: 'category'
        },
        yaxis: {
          title: {
            text: 'Votes'
          }
        }
      };

      var chart = new ApexCharts(document.querySelector("#vote-results"), options);
      chart.render();
    });

    function editVoteResult(contestant) {
      // Edit vote result logic here
      console.log("Edit vote result for contestant:", contestant);
    }

    function deleteVoteResult(contestant) {
      // Delete vote result logic here
      console.log("Delete vote result for contestant:", contestant);
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
</body>

</html>