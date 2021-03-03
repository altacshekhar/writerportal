<style>
table, td, th {
  border: 1px solid black;
}

table {
  width: 100%;
  border-collapse: collapse;
}
</style>
<?php
echo '<table>'; 
echo '<thead><tr><td>Target Site</td><td>Content Score</td><td>Word Count</td><td>Backlinks</td><td>Top 10 Backlinks</td></tr></thead>';
echo '<tbody>';
foreach($articles as $article)
{
    $result = json_decode($article->article_content_performance,true);
    echo '<tr>';
    echo '<td>'.$article->article_site_id.'/'.$article->article_permalink.'.html</td>';
    echo '<td>'.$article->article_content_score.'</td>';
    echo '<td>'.$result['result']['content_performance']['total_word_on_page'].'</td>';
    echo '<td>'.$article->article_backlinks_count.'</td>';
    echo '<td>'.$article->article_backlinks_target_count.'</td>';
    echo '</tr>';
}
echo '</tbody><table>';
?>