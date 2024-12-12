
<div class="chart-wrapper">
    <canvas id="articleChart2" ></canvas>


    <script>
        <?php 
            global $articleData;
        ?>



        // Process the data to count the number of articles published each week for each category
        let articlesByWeekAndCategory = {};
        articleData.forEach(article => {
            // Extract week number from the post_date
            let postDate = new Date(article.post_date);
            let weekNumber = getWeekNumber(postDate);
            
            // If weekNumber is not in articlesByWeekAndCategory, initialize it
            if (!articlesByWeekAndCategory.hasOwnProperty(weekNumber)) {
                articlesByWeekAndCategory[weekNumber] = {};
            }
            
            // Increment the count for the category
            let category = article.categorie;
            if (!articlesByWeekAndCategory[weekNumber].hasOwnProperty(category)) {
                articlesByWeekAndCategory[weekNumber][category] = 1;
            } else {
                articlesByWeekAndCategory[weekNumber][category]++;
            }
        });

        // Prepare the data for Chart.js
        let weekLabels2 = [];
        let categoryCounts = {};
        let categories = [];
        for (let weekNumber in articlesByWeekAndCategory) {
            weekLabels2.push('Week ' + weekNumber);
            for (let category in articlesByWeekAndCategory[weekNumber]) {
                if (!categories.includes(category)) {
                    categories.push(category);
                    categoryCounts[category] = [];
                }
                categoryCounts[category].push(articlesByWeekAndCategory[weekNumber][category]);
            }
        }

        // Chart.js configuration
        let ctx2 = document.getElementById('articleChart2').getContext('2d');
        let myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: weekLabels2, // Corrected to use weekLabels2
                datasets: categories.map((category, index) => ({
                    label: category,
                    data: categoryCounts[category],
                    backgroundColor: `rgba(${index * 50}, 99, 132, 0.2)`,
                    borderColor: `rgba(${index * 50}, 99, 132, 1)`,
                    borderWidth: 1
                }))
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true ,
                        precision: 0, // Set precision to 0 to display integer values only
                        stepSize: 1 // Set step size to 1 to ensure only integer values are displayed
                    }
                }
            }
        });

        // Function to get week number from date
        function getWeekNumber(date) {
            let onejan = new Date(date.getFullYear(), 0, 1);
            let millisecsInDay = 86400000;
            return Math.ceil((((date - onejan) / millisecsInDay) + onejan.getDay() + 1) / 7);
        }

         // Wait for the document to fully load
         document.addEventListener("DOMContentLoaded", function() {
            // Get the canvas elements
            let articleChartCanvas = document.getElementById('articleChart');
            let articleChart2Canvas = document.getElementById('articleChart2');

            // Apply your desired styles
            articleChartCanvas.style.width = "600px";
            articleChartCanvas.style.height = "400px";
            articleChart2Canvas.style.width = "600px";
            articleChart2Canvas.style.height = "400px";

        });
    </script>


</div>
