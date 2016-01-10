In the task 3,we had to take twitter id and tweet as input and we had calculate the probability of 
that tweet to be tweeted by that twitter id.

Steps of My Approach:

1. At first,all the delimiters(and special characters) of the tweets by the twitter id 
	were removed.
2. Then all the words of the tweets posted by the twitter id were inserted into an array
	except the common words used now and then in English language(for example: am,is,are,
	a,the,we etc.).
3. In the time of inserting words into the array,repetition WAS NOT ALLOWED.  
4. Then all the delimiters(and special characters) of the input string(tweet) were removed.
6. Then the number of matched words between the input string and the previously saved word array
	is counted.
7. All the common words(for example: am,is,are,a,the,we etc.) were ignored during the matching.
8. Then probability is calculated by (no. of matched words/total no. of words in the input string).


It is a naive approach. It fails to calculate the probability in many case. But,it also successfully
calculates the probability in most of the cases.  