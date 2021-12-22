<?php
function pagination($number, $page, $search)
{
    if ($number > 1) {
        echo '<ul class="pagination">';

        if ($page > 1) {
            echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '&search=' . $search . '" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>';
        }
 
        $availablePage = [1, $page - 1, $page, $page + 1, $number];
        $isFirst = $isLast = false;

        for ($i = 0; $i < $number; $i++) {
            if (!in_array(($i + 1), $availablePage)) {
                if (!$isFirst && $page > 3) {
                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 2) . '&search=' . $search . '">...</a></li>';
                    $isFirst = true;
                }

                if (!$isLast && ($i > $page)) {
                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 2) .'&search=' . $search . '">...</a></li>';
                    $isLast = true;
                }

                continue;
            }

            if ($page == ($i + 1)) {
                echo '<li class="page-item active"><a class="page-link" href="#">' . ($i + 1) . '</a></li>';
            } else {
                echo '<li class="page-item"><a class="page-link" href="?page=' . ($i + 1) . '&search=' . $search . '">' . ($i + 1) . '</a></li>';
            }
        }

        if ($page < $number) {
            echo '<li class="page-item">
								<a class="page-link" href="?page=' . ($page + 1) . '&search=' . $search . '" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
								</a>
							</li>';
        }
        
        echo '</ul>';
    }
}
