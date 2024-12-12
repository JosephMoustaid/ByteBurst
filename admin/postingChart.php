
<div class="chart-wrapper">
    <canvas id="articleChart"></canvas>
    <script>
        <?php 
            global $articleData;
        ?>



        // Process the data to count the number of articles published each week
        let articleData = <?php echo json_encode($articleData); ?>;
        let articlesByWeek = {};
        articleData.forEach(article => {
            // Extract week number from the post_date
            let postDate = new Date(article.post_date);
            let weekNumber = getWeekNumber(postDate);

            // If weekNumber is not in articlesByWeek, initialize it with 1 article, else increment the count
            if (!articlesByWeek.hasOwnProperty(weekNumber)) {
                articlesByWeek[weekNumber] = 1;
            } else {
                articlesByWeek[weekNumber]++;
            }
        });

        // Prepare the data for Chart.js
        let weekLabels = [];
        let articleCounts = [];
        for (let weekNumber = 1; weekNumber <= 4; weekNumber++) {
            weekLabels.push('Week ' + weekNumber);
            articleCounts.push(articlesByWeek[weekNumber] || 0); // If no articles were published, set count to 0
        }

        // Chart.js configuration
        let ctx = document.getElementById('articleChart').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: weekLabels,
                datasets: [{
                    label: 'Articles Published',
                    data: articleCounts,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
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

       
    </script>
</div>
