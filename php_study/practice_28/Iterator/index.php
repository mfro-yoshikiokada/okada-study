<?php
/*=================================================================

 インターフェイス

=================================================================*/

// Aggregate Interface
interface AuthorList {
    /**
     * Iteratorを返すメソッド
     * @return AuthorIterator
     */
    public function createIterator();
}

// Iterator Interface
interface AuthorIterator {
    /**
     * 次の要素があるかどうかを判定する
     * @return bool
     */
    public function hasNext();

    /**
     * 次の要素を返し、ポインターを進める
     * @return mixed
     */
    public function next();
}

/*=================================================================

 Iteratorの実装

=================================================================*/

// Iteratorクラス、このクラス内で列挙の手順を記述する。
// AuthorIteratorインターフェイスを実装するようにする。
class AuthorList_Simple_Iterator implements AuthorIterator {
    private $authors;
    private $position = 0;

    function __construct( $authors ) {
        $this->authors = $authors;
    }

    public function hasNext() {
        return isset( $this->authors[ $this->position ] );
    }

    public function next() {
        return $this->authors[ $this->position ++ ];
    }

}

// 別のIteratorクラス、列挙の手順が一個前と違うけど、
// 同じAuthorIteratorインターフェイスを持っているので、使う側からしたら差異はない
class AuthorList_Detailed_Iterator implements AuthorIterator {
    protected $authors;
    private $position = 0;

    function __construct( $authors ) {
        $this->authors = $authors;
    }

    public function hasNext() {
        return isset( $this->authors[ $this->position ] );
    }

    public function next() {
        $author      = $this->authors[ $this->position ++ ];
        $family_name = $author['family-name'];
        $given_name  = $author['given-name'];

        return $family_name . ' - ' . $given_name;
    }

}

// 更に別のIteratorクラス、「AuthorList_Detailed_Iterator」と似ているので、継承する
class AuthorList_Detailed_OrderByID_Iterator extends AuthorList_Detailed_Iterator implements AuthorIterator {
    function __construct( $authors ) {
        usort( $authors, function ( $a, $b ) {
            return (int) $a['id'] > (int) $b['id'];
        } );
        $this->authors = $authors;
    }
}

/*=================================================================

 Aggregate(集約オブジェクト)の実装

=================================================================*/

// クラス間で共有しているメソッドたちを分離しておく。
trait AuthorList_Methods {
    private $author_list;

    function __construct( $authors ) {
        $this->author_list = $authors;
    }

    public function add_to_list( $author ) {
        $this->author_list[] = $author;
    }

    public function get_author_list() {
        return $this->author_list;
    }
}

// 集約オブジェクト　　著者一覧[簡易版]
class Authors_Simple implements AuthorList {
    use AuthorList_Methods;

    public function createIterator() {
        return new AuthorList_Simple_Iterator( $this->author_list );
    }
}

// 集約オブジェクト　　著者一覧[詳細版]
class Authors_Detailed implements AuthorList {
    use AuthorList_Methods;

    public function createIterator() {
        return new AuthorList_Detailed_Iterator( $this->author_list );
    }
}

// 集約オブジェクト　　著者一覧[詳細+並び替え版]
class Authors_Detailed_OrderByID implements AuthorList {
    use AuthorList_Methods;

    public function createIterator() {
        return new AuthorList_Detailed_OrderByID_Iterator( $this->author_list );
    }
}

/*=================================================================

 クライアントである「書籍クラス」

=================================================================*/

class Book {
    /** @type  AuthorIterator $author_iterator */
    private $author_iterator;

    function __construct( AuthorList $author_list ) {
        // Iteratorオブジェクトを持たせる
        $this->author_iterator = $author_list->createIterator();
    }

    function print_authors() {
        // Iteratorオブジェクトを使う
        while ( $this->author_iterator->hasNext() ) {
            $author = $this->author_iterator->next();
            echo $author . '<br>';
        }
    }
}

/*=================================================================

 メイン処理

=================================================================*/

// 著者一覧のデータ[詳細]
$authors_detailed_array = [
    [
        'family-name' => 'Matumoto',
        'given-name'  => 'Jun',
        'id'          => 5
    ],
    [
        'family-name' => 'Kobayashi',
        'given-name'  => 'Kentaro',
        'id'          => 1,
    ],
    [
        'family-name' => 'Mudata',
        'given-name'  => 'Shuichi',
        'id'          => 2
    ],
    [
        'family-name' => 'Kamijou',
        'given-name'  => 'Touma',
        'id'          => 4
    ],
    [
        'family-name' => 'Murakami',
        'given-name'  => 'Ryu',
        'id'          => 3
    ],
];

// 著者一覧のデータ[簡易]
$authors_simple_array = [ 'Matumoto Jun', 'Kobayashi Kentaro', 'Mudata Shuichi', 'Murakami Ryu', 'Kamijou Touma' ];

// それぞれ違う集約オブジェクトで書籍クラスをインスタンス化
$book_a = new Book( new Authors_Detailed( $authors_detailed_array ) );
$book_b = new Book( new Authors_Simple( $authors_simple_array ) );
$book_c = new Book( new Authors_Detailed_OrderByID( $authors_detailed_array ) );

?>

<section>
    <h1>book_a</h1>
    <?php $book_a->print_authors(); ?>
</section>

<section>
    <h1>book_b</h1>
    <?php $book_b->print_authors(); ?>
</section>

<section>
    <h1>book_c</h1>
    <?php $book_c->print_authors(); ?>
</section>