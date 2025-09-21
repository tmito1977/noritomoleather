<?php
add_filter('query_loop_block_query_vars', function($query, $block) {
    if (!empty($block->context['query']['parents'])) {
        $parents = $block->context['query']['parents'];
        foreach ($parents as $index => $parent) {
            if ($parent === 'current') {
                $parents[$index] = get_queried_object_id();
            }
        }
        $query['post_parent__in'] = $parents;
    }
    return $query;
}, 10, 2);
