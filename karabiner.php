<?php
$map = <<<_MAP_
q:v
w:j
e:slash
r:f
t:c
y:m
u:y
i:r
o:w
p:p

a:e
s:u
d:i
f:a
g:o
h:k
j:s
k:t
l:n
semicolon:h

z:e,i
x:u,u
c:u,i
v:a,i
b:o,u
n:g
m:z
comma:d
period:period
slash:b


q,shift:e,k,i
w,shift:u,k,u
e,shift:i,k,u
r,shift:a,k,u
t,shift:o,k,u
y,shift:m,y
u,shift:x,t,u
i,shift:r,y
o,shift:n,n
p,shift:p,y

a,shift:e,n,n
s,shift:u,n,n
d,shift:i,n,n
f,shift:a,n,n
g,shift:o,n,n
h,shift:k,y
j,shift:s,y
k,shift:t,y
l,shift:n,y
semicolon,shift:h,y

z,shift:e,t,u
x,shift:u,t,u
c,shift:u,t,u
v,shift:a,t,u
b,shift:o,t,u
n,shift:g,y
m,shift:z,y
comma,shift:d,y
period,shift:comma
slash,shift:b,y
_MAP_;

//$json = [];
echo "[\n";
foreach (explode(PHP_EOL, $map) as $line) {
    if (!$line) continue;
    [$from, $to] = explode(':', $line);
    $froms = explode(',', $from);
    $from_array = ['key_code' => $froms[0]];
    if (count($froms) >= 2) {
        $from_array['modifiers'] = ['mandatory' => [$froms[1]]];
    }
    $tos = explode(',', $to);
    $to_array = [];
    foreach ($tos as $key) {
        $to_array[] = ['key_code' => $key];
    }
?>
{ "type":"basic",
  "from": <?=json_encode($from_array)?>,
  "to": <?= json_encode($to_array) ?>,
  "conditions": [{"type":"input_source_if", "input_sources":[{"language":"ja"}]}]
},
<?php
    /*
    $json[] = [
        'type' => 'basic',
        'from' => ['key_code' => $from],
        'to' => $to_array,
        'conditions' => [
            [
                'type' => 'input_source_if',
                'input_sources' => [['language' => 'ja']]
            ]
        ],
    ];
     */
}

echo "]\n";

//echo json_encode($json, 448);
