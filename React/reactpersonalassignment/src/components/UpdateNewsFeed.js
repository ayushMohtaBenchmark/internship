import React, {useRef, useEffect} from 'react';
import { useHistory, useParams } from 'react-router-dom';

function UpdateNewsFeed() {

    const titleRef = useRef();
    const descriptionRef = useRef();
    const authorIDRef = useRef();

    const history = useHistory();
    const { news_id } = useParams();

    useEffect(() => {
        fetch(`http://localhost:8012/yii/restAPIyii/frontend/web/index.php/newsfeeds/${news_id}`)
          .then((res) => res.json())
          .then((result) => {
                titleRef.current.value = result.title;
                descriptionRef.current.value = result.description;
                authorIDRef.current.value = result.author_id;
          });
      }, [news_id]);

    async function submitNewsfeed(event) {
        event.preventDefault();
    
        const newNewsFeed = {
          title: titleRef.current.value,
          description: descriptionRef.current.value,
          author_id: Number(authorIDRef.current.value)
        };
        // console.log(JSON.stringify(newNewsFeed));
        await fetch(`http://localhost:8012/yii/restAPIyii/frontend/web/index.php/newsfeeds/${news_id}`,{
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
          },
          method: "PUT",
          body: JSON.stringify(newNewsFeed)
        });
        titleRef.current.value = '';
        descriptionRef.current.value = '';
        authorIDRef.current.value = '';
        history.push('/');
        // getNewsFeed();
    }


    return (
        <div style={{marginTop: '50px', marginLeft: '50px'}}>
            <form onSubmit={submitNewsfeed}>
                <label><strong>Title</strong></label>&nbsp;
                <input type="text" ref={titleRef} /><br /><br />
                <label><strong>Description</strong></label>&nbsp;
                <input type="text" ref={descriptionRef} /><br /><br />
                <label><strong>Author ID</strong></label>&nbsp;
                <input type="number" ref={authorIDRef} /><br /><br />
                <button className='button button1' type='submit'>Update</button>&nbsp;
            </form><br />
        </div>
    )
}

export default UpdateNewsFeed;
