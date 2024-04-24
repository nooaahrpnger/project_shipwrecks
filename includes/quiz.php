    <h1>Sunken Ships Quiz</h1>
    <form id="quizForm"  method="post">
        <h2>Question 1: Which ship, often called "The Ship of Gold", sank in 1857 off the coast of South Carolina?</h2>
        <input type="radio" name="q1" value="A"> A. RMS Titanic<br>
        <input type="radio" name="q1" value="B"> B. USS Monitor<br>
        <input type="radio" name="q1" value="C"> C. SS Central America<br>

        <h2>Question 2: Which ship, known for its tragic sinking during World War II, was the largest shipwreck of its kind?</h2>
        <input type="radio" name="q2" value="A"> A. RMS Lusitania<br>
        <input type="radio" name="q2" value="B"> B. USS Arizona<br>
        <input type="radio" name="q2" value="C"> C. RMS Titanic<br>

        <h2>Question 3: The shipwreck of which British ocean liner led to significant maritime safety regulations?</h2>
        <input type="radio" name="q3" value="A"> A. SS Great Eastern<br>
        <input type="radio" name="q3" value="B"> B. RMS Titanic<br>
        <input type="radio" name="q3" value="C"> C. RMS Lusitania<br>

        <h2>Question 4: Which German battleship was sunk by the Royal Navy during World War II in the North Atlantic?</h2>
        <input type="radio" name="q4" value="A"> A. Bismarck<br>
        <input type="radio" name="q4" value="B"> B. Tirpitz<br>
        <input type="radio" name="q4" value="C"> C. Scharnhorst<br>

        <h2>Question 5: Which ocean liner sank in 1956 off the coast of Nantucket after catching fire?</h2>
        <input type="radio" name="q5" value="A"> A. SS Andrea Doria<br>
        <input type="radio" name="q5" value="B"> B. RMS Queen Elizabeth<br>
        <input type="radio" name="q5" value="C"> C. SS United States<br>

        <h2>Question 6: What was the name of the French ocean liner that sank in 1912 after colliding with a Norwegian ship?</h2>
        <input type="radio" name="q6" value="A"> A. SS Normandie<br>
        <input type="radio" name="q6" value="B"> B. SS La Provence<br>
        <input type="radio" name="q6" value="C"> C. SS France<br>

        <h2>Question 7: Which famous explorer's ship, the Endurance, sank in 1915 after being trapped in ice during an Antarctic expedition?</h2>
        <input type="radio" name="q7" value="A"> A. Ernest Shackleton<br>
        <input type="radio" name="q7" value="B"> B. Robert Falcon Scott<br>
        <input type="radio" name="q7" value="C"> C. Roald Amundsen<br>

        <h2>Question 8: Which Spanish galleon, loaded with treasure, sank off the coast of Florida in 1622?</h2>
        <input type="radio" name="q8" value="A"> A. Nuestra Señora de Atocha<br>
        <input type="radio" name="q8" value="B"> B. San José<br>
        <input type="radio" name="q8" value="C"> C. Santa Maria<br>

        <h2>Question 9: What was the name of the ship that famously sank in Lake Superior during a storm in 1975?</h2>
        <input type="radio" name="q9" value="A"> A. SS Edmund Fitzgerald<br>
        <input type="radio" name="q9" value="B"> B. SS Carl D. Bradley<br>
        <input type="radio" name="q9" value="C"> C. SS Arthur M. Anderson<br>

        <h2>Question 10: Which British ocean liner sank in the Indian Ocean in 1880, resulting in a significant loss of life?</h2>
        <input type="radio" name="q10" value="A"> A. RMS Empress of Ireland<br>
        <input type="radio" name="q10" value="B"> B. RMS Queen Victoria<br>
        <input type="radio" name="q10" value="C"> C. RMS Oceanic<br>

        <input type="submit" name="DATA_submit" value="Finish Quiz">
    </form>
    <script src="quiz.js"></script>

    <?php
    include "FeatureInsertPoints.php";
    
    insertQuizResult($userID,$score);

    ?>
</body>
</html>
