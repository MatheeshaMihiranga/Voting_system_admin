document.getElementById("create-contestant-form").addEventListener("submit", function(event) {
    event.preventDefault();
    // Retrieve form data and perform contestant creation logic
    var formData = new FormData(this);
    var profilePic = formData.get("profile-pic");
    var description = formData.get("description");
    var contestantNumber = formData.get("C_Number");
    var contestantNIC = formData.get("C_NIC");
    var firstName = formData.get("fname");
    var nameWithInitials = formData.get("iname");
    var contestantDescription = formData.get("C_description");
    var city = formData.get("city");
    var district = formData.get("district");

    // Perform contestant creation logic using the form data
    // You can send the data to a server or handle it locally as per your requirements

    // Reset the form fields after submission (optional)
    this.reset();
  });
     // JavaScript code here (for handling form submission, event creation, and search)
    
    // Function to search for an event
    function searchEvent() {
        var searchInput = document.getElementById("search-event").value;
        
        // Perform search logic here, such as fetching event data from a server based on the search input
        
        // For demonstration purposes, let's assume the search results are retrieved and stored in an array
        var searchResults = [
          {
            id: "1",
            name: "Event 1",
            startDate: "2023-06-10",
            endDate: "2023-06-15",
            startTime: "09:00",
            endTime: "18:00",
            location: "Location 1",
            description: "Description 1"
          },
          {
            id: "2",
            name: "Event 2",
            startDate: "2023-06-20",
            endDate: "2023-06-25",
            startTime: "10:00",
            endTime: "17:00",
            location: "Location 2",
            description: "Description 2"
          }
        ];
        
        var searchResultsDiv = document.getElementById("search-results");
        searchResultsDiv.innerHTML = ""; // Clear previous search results
        
        if (searchResults.length > 0) {
          var table = document.createElement("table");
          table.innerHTML = `
            <tr>
              <th>Event Name</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Start Time</th>
              <th>End Time</th>
              <th>Location</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          `;
          
          searchResults.forEach(function(event) {
            table.innerHTML += `
              <tr>
                <td>${event.name}</td>
                <td>${event.startDate}</td>
                <td>${event.endDate}</td>
                <td>${event.startTime}</td>
                <td>${event.endTime}</td>
                <td>${event.location}</td>
                <td>${event.description}</td>
                <td>
                  <button onclick="editEvent('${event.id}')">Edit</button>
                </td>
              </tr>
            `;
          });
          
          searchResultsDiv.appendChild(table);
        } else {
          searchResultsDiv.innerHTML = "No results found.";
        }
      }
      
      // Function to populate the edit event form with the selected event's details
      function editEvent(eventId) {
        // Perform logic to fetch the event details based on the event ID
        
        // For demonstration purposes, let's assume the event details are retrieved and stored in an object
        var eventDetails = {
          id: "1",
          name: "Event 1",
          startDate: "2023-06-10",
          endDate: "2023-06-15",
          startTime: "09:00",
          endTime: "18:00",
          location: "Location 1",
          description: "Description 1"
        };
        
        // Populate the edit event form with the event details
        document.getElementById("edit-event-form").reset(); // Reset form fields
        document.getElementById("edit-event-name").value = eventDetails.name;
        document.getElementById("edit-event-start-date").value = eventDetails.startDate;
        document.getElementById("edit-event-end-date").value = eventDetails.endDate;
        document.getElementById("edit-event-start-time").value = eventDetails.startTime;
        document.getElementById("edit-event-end-time").value = eventDetails.endTime;
        document.getElementById("edit-event-location").value = eventDetails.location;
        document.getElementById("edit-event-description").value = eventDetails.description;
        
        // Scroll to the edit event form for better visibility
        document.getElementById("edit-event-form").scrollIntoView();
      }
      
      // Function to handle the form submission for editing event details
      document.getElementById("edit-event-form").addEventListener("submit", function(event) {
        event.preventDefault();
        // Retrieve form data and perform event details update logic
        var formData = new FormData(this);
        var editedEventName = formData.get("edit-event-name");
        var editedStartDate = formData.get("edit-event-start-date");
        var editedEndDate = formData.get("edit-event-end-date");
        var editedStartTime = formData.get("edit-event-start-time");
        var editedEndTime = formData.get("edit-event-end-time");
        var editedLocation = formData.get("edit-event-location");
        var editedDescription = formData.get("edit-event-description");
        
        // Perform event details update logic using the form data
        // You can send the updated data to a server or handle it locally as per your requirements
        
        // Display a success message or perform any other desired actions
        alert("Event details updated successfully!");
        
        // Reset the form fields after submission (optional)
        this.reset();
      });
       // JavaScript code here (for handling form submission and event creation)
    document.getElementById("create-event-form").addEventListener("submit", function(event) {
        event.preventDefault();
        // Retrieve form data and perform event creation logic
        var formData = new FormData(this);
        var eventId = formData.get("event-id");
        var eventName = formData.get("event-name");
        var startDate = formData.get("event-start-date");
        var endDate = formData.get("event-end-date");
        var startTime = formData.get("event-start-time");
        var endTime = formData.get("event-end-time");
        var location = formData.get("event-location");
        var description = formData.get("event-description");
  
        // Perform event creation logic using the form data
        // You can send the data to a server or handle it locally as per your requirements
  
        // Reset the form fields after submission (optional)
        this.reset();
      });
          // Add your JavaScript code here
    // You can retrieve the data and populate the elements using JavaScript or a server-side language
    // Replace the placeholder data below with the actual data

    // Contestant Data
    document.getElementById("description").value = "Contestant's description";
    document.getElementById("C_Number").value = "123";
    document.getElementById("C_NIC").value = "ABC123";
    document.getElementById("fname").value = "John";
    document.getElementById("iname").value = "J. Doe";
    document.getElementById("C_description").value = "Contestant's email@example.com";
    document.getElementById("city").value = "City";
    document.getElementById("district").value = "District";

    // Event Information
    document.getElementById("event-name").value = "Event Name";
    document.getElementById("event-date").value = "Event Date";
    document.getElementById("event-location").value = "Event Location";
    document.getElementById("event-description").value = "Event Description";
  